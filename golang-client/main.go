package main

import (
    "context"
    "fmt"
    "github.com/montanaflynn/stats"
    app "golang-client/proto"
    "google.golang.org/grpc"
    "google.golang.org/grpc/credentials"
    "log"
    "os"
    "sync"
    "text/tabwriter"
    "time"

    //"time"
)

type ThreadMetric struct {
    perc25 time.Duration
    perc50 time.Duration
    median time.Duration
    perc75 time.Duration
    perc90 time.Duration
    perc95 time.Duration
    perc99 time.Duration
}

func main() {
    creds, err := credentials.NewClientTLSFromFile("../localhost.crt", "")
    if err != nil {
        panic(err)
    }

    conn, err := grpc.Dial("localhost:50051", grpc.WithTransportCredentials(creds))
    if err != nil {
        panic(err)
    }
    
    client := app.NewCalculatorClient(conn)

    numberOfThreads := 10
    numberOfIterations := 1000

    threadMetrics := make([]ThreadMetric, numberOfThreads, numberOfThreads)

    var wg sync.WaitGroup


    for thread := 0; thread < numberOfThreads; thread++ {
        wg.Add(1)
        go func(wg *sync.WaitGroup, threadNumber int, localThreadMetrics []ThreadMetric, numberOfIterations int) {
            defer wg.Done()

            reqDurations := make([]time.Duration, numberOfIterations, numberOfIterations)

            for i := 0; i< numberOfIterations; i++ {
                start := time.Now()

                // main.go
                // import app "golang-client/proto"
                w := app.Work{
                    Logid:   "some uid",
                    Num1:    10,
                    Num2:    20,
                    Op:      app.Operation_ADD,
                    Comment: "We are going to add 2 numbers here",
                }

                result, err2 := client.Calculate(context.Background(), &w)

                if err2 != nil {
                    return
                }
                fmt.Println(result)

                res, err := client.Add(context.Background(), &app.Add{Num1: 5, Num2: 20})
                duration := time.Since(start)
                reqDurations[i] = duration
                if err != nil {
                    panic(err)
                }
                log.Printf("Thread: %v. Result: %v. It took: %v", threadNumber, res.Result, duration)
            }

            data := stats.LoadRawData(reqDurations)
            median, _ := stats.Median(data)
            perc25, _ := stats.Percentile(data, 25)
            perc50, _ := stats.Percentile(data, 50)
            perc90, _ := stats.Percentile(data, 90)
            perc95, _ := stats.Percentile(data, 95)
            perc99, _ := stats.Percentile(data, 99)
            localThreadMetrics[threadNumber].perc25 = time.Duration(perc25)
            localThreadMetrics[threadNumber].median = time.Duration(median)
            localThreadMetrics[threadNumber].perc50 = time.Duration(perc50)
            localThreadMetrics[threadNumber].perc90 = time.Duration(perc90)
            localThreadMetrics[threadNumber].perc95 = time.Duration(perc95)
            localThreadMetrics[threadNumber].perc99 = time.Duration(perc99)
        }(&wg, thread, threadMetrics, numberOfIterations)
    }
    wg.Wait()

    const padding = 3
    w := tabwriter.NewWriter(os.Stdout, 0, 0, padding, ' ', tabwriter.AlignRight|tabwriter.Debug)

    fmt.Fprintf(w, "Thread\tIterations\t25\tmedian\t50\t90\t99\t\n")
    for i, v := range threadMetrics {
        fmt.Fprintf(w, "%v\t%v\t%v\t%v\t%v\t%v\t%v\t\n", i, numberOfIterations, v.perc25, v.median, v.perc50, v.perc90, v.perc99)
    }
    w.Flush()
}
