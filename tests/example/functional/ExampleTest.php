<?php

namespace Mougrim\PhpunitSoftMocks\Example;

use Mougrim\PhpunitSoftMocks\TestCase;

/**
 * @author Mougrim <rinat@mougrim.ru>
 */
class ExampleTest extends TestCase
{
    public function testFunction()
    {
        $example = new Example();
        static::assertSame(1, $example->stringLength());
        $this->redefineFunction(
            'strlen',
            function ($string) {
                return 2;
            }
        );
        static::assertSame(2, $example->stringLength());
        $this->restoreFunction('strlen');
        static::assertSame(1, $example->stringLength());
    }

    public function testConstant()
    {
        // load file with constant
        class_exists(Example::class);
        static::assertTrue(defined('SOME_CONSTANT'));

        static::assertSame(3, SOME_CONSTANT);

        $this->redefineConstant('SOME_CONSTANT', 4);
        static::assertSame(4, SOME_CONSTANT);

        $this->restoreConstant('SOME_CONSTANT');
        static::assertSame(3, SOME_CONSTANT);

        $this->removeConstant('SOME_CONSTANT');
        static::assertFalse(defined('SOME_CONSTANT'));

        $this->restoreAllConstants();
        static::assertSame(3, SOME_CONSTANT);
    }

    public function testClassConstant()
    {
        static::assertTrue(defined(Example::class.'::CLASS_CONSTANT'));
        static::assertSame(5, Example::CLASS_CONSTANT);

        $this->redefineClassConstant(Example::class, 'CLASS_CONSTANT', 6);
        static::assertSame(6, Example::CLASS_CONSTANT);

        $this->restoreClassConstant(Example::class, 'CLASS_CONSTANT');
        static::assertSame(5, Example::CLASS_CONSTANT);

        $this->removeClassConstant(Example::class, 'CLASS_CONSTANT');
        static::assertFalse(defined(Example::class.'::CLASS_CONSTANT'));

        $this->restoreAllConstants();
        static::assertSame(5, Example::CLASS_CONSTANT);
    }

    public function testMethod()
    {
        $example = new Example();
        static::assertSame(24, $example->factorial(4));
        $this->redefineMethod(
            [Example::class, 'factorial'],
            function ($n) {
                return -1;
            }
        );

        static::assertSame(-1, $example->factorial(4));
        static::assertSame(-4, $this->callOriginal([$example, 'factorial'], [4]));

        $this->restoreMethod([Example::class, 'factorial']);
        static::assertSame(24, $example->factorial(4));
    }

    public function testConstructor()
    {
        $test = $this;
        $example = new Example(1);
        static::assertSame(1, $example->property);

        $this->redefineMethod(
            [Example::class, '__construct'],
            function ($value) use ($test) {
                /** @var Example $this */
                $test->callOriginal([$this, '__construct'], [$value * 2]);
            }
        );
        $example = new Example(1);
        static::assertSame(2, $example->property);
    }
}
