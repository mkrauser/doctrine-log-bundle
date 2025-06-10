<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnNeverTypeRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withIndent(indentChar: ' ', indentSize: 4)
    ->withPaths([
        'Attribute',
        'DependencyInjection',
        'Entity',
        'EventSubscriber',
        'Service',
        'Tests',
        'MbDoctrineLogBundle.php',
    ])
    ->withSkip([
        // this causes Problems
        InlineConstructorDefaultToPropertyRector::class => [
            __DIR__ . '/src/Backoffice/Services/NbkJsonResponse.php',
            __DIR__ . '/src/Common/Entity/User.php'
        ],
        AddParamTypeDeclarationRector::class => [
            __DIR__ . '/src/VirtualKernel.php',
        ],
        // see https://github.com/rectorphp/rector/issues/8009
        DisallowedEmptyRuleFixerRector::class,
        // results in duplicate getDefaultOptions-Declarations
        ReturnNeverTypeRector::class,
    ])
    ->withPhpSets(
        php81: true
    )
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true
    )
    ->withParallel(600)
    ->withPhpVersion(PhpVersion::PHP_84)
    ->withImportNames(true)
    ->withComposerBased(
        doctrine: true,
        phpunit: true
    );
