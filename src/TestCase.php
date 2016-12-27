<?php

namespace Mougrim\PhpunitSoftMocks;

use QA\SoftMocks;

/**
 * @author Mougrim <rinat@mougrim.ru>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    private $closuresClass;

    protected function tearDown()
    {
        $this->restoreAll();
        parent::tearDown();
    }

    /**
     * @param callable|string $name
     * @param callable $function
     */
    public function redefineFunction($name, callable $function)
    {
        SoftMocks::redefineFunction($name, '', $function);
    }

    /**
     * @param callable|string $name
     */
    public function restoreFunction($name)
    {
        SoftMocks::restoreFunction($name);
    }

    public function redefineConstant($name, $value)
    {
        SoftMocks::redefineConstant($name, $value);
    }

    public function restoreConstant($name)
    {
        SoftMocks::restoreConstant($name);
    }

    public function removeConstant($name)
    {
        SoftMocks::removeConstant($name);
    }

    public function redefineClassConstant($class, $name, $value)
    {
        $this->redefineConstant($class.'::'.$name, $value);
    }

    public function restoreClassConstant($class, $name)
    {
        $this->restoreConstant($class.'::'.$name);
    }

    public function removeClassConstant($class, $name)
    {
        $this->removeConstant($class.'::'.$name);
    }

    public function restoreAllConstants()
    {
        SoftMocks::restoreAllConstants();
    }

    /**
     * Only user-defined method redefinition is supported.
     *
     * @param callable|array $classAndMethod [$class, $method] $class - a class name or a trait name
     * @param callable $function
     */
    public function redefineMethod(array $classAndMethod, callable $function)
    {
        list($class, $name) = $classAndMethod;
        $closuresClass = $this->getClosuresClass();
        $closuresClass::${'closures'}[$class][$name] = $function;
        $code = <<<PHP
\$function = {$closuresClass}::\$closures['{$class}']['{$name}'];
if (\$function instanceof \Closure) {
    \$function = \$function->bindTo(\$this);
}
return call_user_func_array(\$function, \$params);
PHP;
        SoftMocks::redefineMethod($class, $name, '', $code);
    }

    private function getClosuresClass()
    {
        if ($this->closuresClass === null) {
            $namespace = __NAMESPACE__;
            $className = str_replace('.', '_', uniqid('ClosuresClass_', true));

            $code = <<<PHP
namespace {$namespace};
class {$className}
{
    public static \$closures = [];
}
PHP;

            eval($code);

            $this->closuresClass = $namespace.'\\'.$className;
        }

        return $this->closuresClass;
    }

    /**
     * @param callable|array $classAndMethod [$class, $method] $class - a class name or a trait name
     */
    public function restoreMethod(array $classAndMethod)
    {
        list($class, $name) = $classAndMethod;
        SoftMocks::restoreMethod($class, $name);
        $closuresClass = $this->getClosuresClass();
        unset($closuresClass::${'closures'}[$class][$name]);
    }

    public function callOriginal(callable $callable, array $params)
    {
        return SoftMocks::callOriginal($callable, $params);
    }

    public function restoreAll()
    {
        SoftMocks::restoreAll();
        if ($this->closuresClass) {
            $closuresClass = $this->closuresClass;
            $closuresClass::${'closures'} = [];
        }
    }
}
