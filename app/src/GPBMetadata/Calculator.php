<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: calculator.proto

namespace App\GPBMetadata;

class Calculator
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
?
calculator.protoapp"^
Work
logid (	
num1 (
num2 (
op (2.app.Operation
comment (	"!
Add
num1 (
num2 ("
PingRequest"
PingResponse"

ZipRequest"
ZipResponse">
Result
result (
error (
error_message (	*<
	Operation
ADD 
SUBTRACT
MULTIPLY

DIVIDE2?

Calculator
Add.app.Add.app.Result" %
	Calculate	.app.Work.app.Result" -
Ping.app.PingRequest.app.PingResponse" *
Zip.app.ZipRequest.app.ZipResponse" B#?App\\Calculator?App\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

