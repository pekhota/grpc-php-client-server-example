<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: calculator.proto

namespace App\Calculator;

use UnexpectedValueException;

/**
 * Protobuf type <code>app.Operation</code>
 */
class Operation
{
    /**
     * Generated from protobuf enum <code>ADD = 0;</code>
     */
    const ADD = 0;
    /**
     * Generated from protobuf enum <code>SUBTRACT = 1;</code>
     */
    const SUBTRACT = 1;
    /**
     * Generated from protobuf enum <code>MULTIPLY = 2;</code>
     */
    const MULTIPLY = 2;
    /**
     * Generated from protobuf enum <code>DIVIDE = 3;</code>
     */
    const DIVIDE = 3;

    private static $valueToName = [
        self::ADD => 'ADD',
        self::SUBTRACT => 'SUBTRACT',
        self::MULTIPLY => 'MULTIPLY',
        self::DIVIDE => 'DIVIDE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

