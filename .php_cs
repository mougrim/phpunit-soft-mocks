<?php
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => true,
        'php_unit_construct' => true,
        'php_unit_strict' => true,
        'strict_comparison' => true,
        'combine_consecutive_unsets' => true,
        'dir_constant' => true,
        'ereg_to_preg' => true,
        'modernize_types_casting' => true,
        'no_multiline_whitespace_before_semicolons' => true,
        'no_php4_constructor' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'strict_param' => true,
        'phpdoc_to_comment' => false,
        'phpdoc_var_without_name' => false,
        'phpdoc_align' => false,
    ])
    ->setFinder(
        Finder::create()
            ->in(__DIR__)
            ->append([__DIR__ . '/bin/phpunit-soft-mocks'])
    )
;
