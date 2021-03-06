<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: calculator.proto

namespace App\Calculator;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>app.Work</code>
 */
class Work extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string logid = 1;</code>
     */
    protected $logid = '';
    /**
     * Generated from protobuf field <code>int32 num1 = 2;</code>
     */
    protected $num1 = 0;
    /**
     * Generated from protobuf field <code>int32 num2 = 3;</code>
     */
    protected $num2 = 0;
    /**
     * Generated from protobuf field <code>.app.Operation op = 4;</code>
     */
    protected $op = 0;
    /**
     * Generated from protobuf field <code>string comment = 5;</code>
     */
    protected $comment = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $logid
     *     @type int $num1
     *     @type int $num2
     *     @type int $op
     *     @type string $comment
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\Calculator::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string logid = 1;</code>
     * @return string
     */
    public function getLogid()
    {
        return $this->logid;
    }

    /**
     * Generated from protobuf field <code>string logid = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLogid($var)
    {
        GPBUtil::checkString($var, True);
        $this->logid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 num1 = 2;</code>
     * @return int
     */
    public function getNum1()
    {
        return $this->num1;
    }

    /**
     * Generated from protobuf field <code>int32 num1 = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setNum1($var)
    {
        GPBUtil::checkInt32($var);
        $this->num1 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 num2 = 3;</code>
     * @return int
     */
    public function getNum2()
    {
        return $this->num2;
    }

    /**
     * Generated from protobuf field <code>int32 num2 = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setNum2($var)
    {
        GPBUtil::checkInt32($var);
        $this->num2 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.app.Operation op = 4;</code>
     * @return int
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * Generated from protobuf field <code>.app.Operation op = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setOp($var)
    {
        GPBUtil::checkEnum($var, \App\Calculator\Operation::class);
        $this->op = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string comment = 5;</code>
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Generated from protobuf field <code>string comment = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setComment($var)
    {
        GPBUtil::checkString($var, True);
        $this->comment = $var;

        return $this;
    }

}

