<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: calculator.proto

namespace App\Calculator;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>app.Result</code>
 */
class Result extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>float result = 1;</code>
     */
    protected $result = 0.0;
    /**
     * protobuf doesn't support exceptions
     *
     * Generated from protobuf field <code>bool error = 2;</code>
     */
    protected $error = false;
    /**
     * Generated from protobuf field <code>string error_message = 3;</code>
     */
    protected $error_message = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $result
     *     @type bool $error
     *           protobuf doesn't support exceptions
     *     @type string $error_message
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\Calculator::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>float result = 1;</code>
     * @return float
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Generated from protobuf field <code>float result = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkFloat($var);
        $this->result = $var;

        return $this;
    }

    /**
     * protobuf doesn't support exceptions
     *
     * Generated from protobuf field <code>bool error = 2;</code>
     * @return bool
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * protobuf doesn't support exceptions
     *
     * Generated from protobuf field <code>bool error = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkBool($var);
        $this->error = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string error_message = 3;</code>
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * Generated from protobuf field <code>string error_message = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setErrorMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->error_message = $var;

        return $this;
    }

}
