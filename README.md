## PHPUnit soft mocks

PHPUnit-soft-mocks is library for simple running [PhpUnit](https://github.com/sebastianbergmann/phpunit) with [Badoo soft-mocks](https://github.com/badoo/soft-mocks) using [Composer](https://getcomposer.org/). Also this library resolve soft-mocks coverage issues by require php-code-coverage with fixes. Also this library provide soft-mocks wrapper [\Mougrim\PhpunitSoftMocks\TestCase](src/TestCase.php).

[![Latest Stable Version](https://poser.pugx.org/mougrim/phpunit-soft-mocks/version)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![Latest Unstable Version](https://poser.pugx.org/mougrim/phpunit-soft-mocks/v/unstable)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![License](https://poser.pugx.org/mougrim/phpunit-soft-mocks/license)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![Build Status](https://api.travis-ci.org/mougrim/phpunit-soft-mocks.png?branch=master)](https://travis-ci.org/mougrim/phpunit-soft-mocks)
[![Test Coverage](https://codeclimate.com/github/mougrim/phpunit-soft-mocks/badges/coverage.svg)](https://codeclimate.com/github/mougrim/phpunit-soft-mocks/coverage)

### Installation

You can install PHPUnit-soft-mocks via [Composer](https://getcomposer.org/):

```bash
php composer.phar require --dev mougrim/phpunit-soft-mocks
mkdir /tmp/mocks/ # create dir with soft-mocks cache
```

### Using

Instead using `bin/phpunit` you have to use `bin/phpunit-soft-mocks` for correct soft-mocks working:

```bash
bin/phpunit-soft-mocks --configuration phpunit.xml
```

For using soft-mocks wrapper you can extend [\Mougrim\PhpunitSoftMocks\TestCase](src/TestCase.php) class, see [example](tests/example/functional/ExampleTest.php).
