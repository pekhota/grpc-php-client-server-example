<?php
# Generated by the protocol buffer compiler (spiral/php-grpc). DO NOT EDIT!
# source: calculator.proto

namespace App\Calculator;

use Spiral\GRPC;

interface CalculatorInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "app.Calculator";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Add $in
    * @return Result
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Add(GRPC\ContextInterface $ctx, Add $in): Result;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Work $in
    * @return Result
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Calculate(GRPC\ContextInterface $ctx, Work $in): Result;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param PingRequest $in
    * @return PingResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ZipRequest $in
    * @return ZipResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Zip(GRPC\ContextInterface $ctx, ZipRequest $in): ZipResponse;
}
