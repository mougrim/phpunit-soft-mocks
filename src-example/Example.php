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

    public function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        }

        return $n * $this->factorial($n - 1);
    }

    public function stringLength()
    {
        return strlen('a');
    }
}
