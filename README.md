# grpc-php-client-server-example

PHP Server under Roadrunner vs Golang client Example

## Getting started

1. composer install
2. docker-compose up -d 

If you want to update grpc php proto files then run:

`php app.php grpc:generate proto/calculator.proto`

## Client 

See ./golang-client/readme.md for client details.

## Grpcui Client

Instead of running golang client you can use [grpcui tool](https://github.com/fullstorydev/grpcui). 
Usage example:
```shell
cd /Users/alex/work/grpc-thrift/grpc
grpcui -insecure -import-path ./proto/ -proto calculator.proto localhost:50051
```

## Problems 

Support for optional fields

```shell
bash-5.1# php app.php grpc:generate proto/calculator.proto
Compiling `proto/calculator.proto`:
Error: calculator.proto: is a proto3 file that contains optional fields, 
but code generator protoc-gen-php-grpc hasn't been updated to support optional fields in proto3. 
Please ask the owner of this code generator to support proto3 optional.--php-grpc_out:
```

