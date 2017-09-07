<?php

namespace Mougrim\PhpunitSoftMocks\Example;

define('SOME_CONSTANT', 3);

/**
 * @author Mougrim <rinat@mougrim.ru>
 */
class Example
{
    const CLASS_CONSTANT = 5;

    public $property;

    public function __construct($value = 0)
    {
        $this->property = $value;
    }

    public function factorial($number)
    {
        if ($number <= 1) {
            return 1;
        }

        return $number * $this->factorial($number - 1);
    }

    public function stringLength()
    {
        return strlen('a');
    }

    public static function selfFactorial($number)
    {
        if ($number <= 1) {
            return 1;
        }

        return $number * self::selfFactorial($number - 1);
    }

    public static function staticFactorial($number)
    {
        if ($number <= 1) {
            return 1;
        }

        return $number * self::staticFactorial($number - 1);
    }
}
