<?php

namespace App\Calculator;

use Spiral\GRPC;

class Calculator implements CalculatorInterface
{

    public function Add(GRPC\ContextInterface $ctx, Add $in): Result
    {
        $res = null;
        $err = false;
        $errMessage = "";

        $res = $in->getNum1() + $in->getNum2();

        return new Result([
            "result" => $res,
            "error" => $err,
            "error_message" => $errMessage
        ]);
    }

    public function Calculate(GRPC\ContextInterface $ctx, Work $in): Result
    {
        $res = null;
        $err = false;
        $errMessage = "";

        switch ($in->getOp()) {
            case Operation::ADD:
                $res = $in->getNum1() + $in->getNum2();
                break;
            case Operation::SUBTRACT:
                $res = $in->getNum1() - $in->getNum2();
                break;
            case Operation::MULTIPLY:
                $res = $in->getNum1() * $in->getNum2();
                break;
            case Operation::DIVIDE:
                if ($in->getNum2() === 0) {
                    $res = 0;
                    $err = true;
                    $errMessage = "Can't divide by zero";
                    break;
                }

                $res = $in->getNum1() / $in->getNum2();
                break;
        }

        return new Result([
            "result" => $res,
            "error" => $err,
            "error_message" => $errMessage
        ]);
    }

    public function Ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse
    {
        return new PingResponse();
    }

    public function Zip(GRPC\ContextInterface $ctx, ZipRequest $in): ZipResponse
    {
        return new ZipResponse();
    }
}
