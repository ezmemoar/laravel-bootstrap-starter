<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['.github', '.vscode', '.node_modules', 'public', 'vendor'])
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;