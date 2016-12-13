<?php
/**
 * @author Mougrim <rinat@mougrim.ru>
 */

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require PHPUNIT_COMPOSER_INSTALL;
$loader->addPsr4('Mougrim\\PhpunitSoftMocks\\Example\\', 'tests/example/functional');
