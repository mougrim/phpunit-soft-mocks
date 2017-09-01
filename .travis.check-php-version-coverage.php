#!/usr/bin/env php
<?php
$isVersion71 = version_compare('7.1', PHP_VERSION) <= 0 && version_compare('7.2', PHP_VERSION) > 0;
if ($isVersion71 && getenv('PHPUNIT_VERSION') === '^5.7.0') {
    echo 1;
} else {
    echo 0;
}
