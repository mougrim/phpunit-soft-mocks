## PHPUnit soft mocks

PHPUnit-soft-mocks is [Badoo soft-mocks](https://github.com/badoo/soft-mocks) wrapper for [PhpUnit](https://github.com/sebastianbergmann/phpunit). The wrapper is [\Mougrim\PhpunitSoftMocks\TestCase](src/TestCase.php).

[![Latest Stable Version](https://poser.pugx.org/mougrim/phpunit-soft-mocks/version)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![Latest Unstable Version](https://poser.pugx.org/mougrim/phpunit-soft-mocks/v/unstable)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![License](https://poser.pugx.org/mougrim/phpunit-soft-mocks/license)](https://packagist.org/packages/mougrim/phpunit-soft-mocks)
[![Build Status](https://api.travis-ci.org/mougrim/phpunit-soft-mocks.png?branch=master)](https://travis-ci.org/mougrim/phpunit-soft-mocks)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mougrim/phpunit-soft-mocks/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mougrim/phpunit-soft-mocks/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mougrim/phpunit-soft-mocks/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mougrim/phpunit-soft-mocks/?branch=master)

### Installation

You can install PHPUnit-soft-mocks via [Composer](https://getcomposer.org/):

1. Add to composer.json (for patch phpunit packages):
    ```json
    {
        "minimum-stability": "beta",
        "prefer-stable": true,
        "extra": {
            "enable-patching": true
        }
    }
    ```
2. Run:
    ```bash
    composer require --dev mougrim/phpunit-soft-mocks
    mkdir /tmp/mocks/ # create dir with soft-mocks cache
    ```

### Using

For using soft-mocks wrapper you can extend [\Mougrim\PhpunitSoftMocks\TestCase](src/TestCase.php) class, see [example](tests/example/functional/ExampleTest.php).
