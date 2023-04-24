<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Testing\RuleTestCase;

abstract class AbstractMagicNumberTest extends RuleTestCase
{
    public static function getAdditionalConfigFiles(): array
    {
        return array_merge(
            parent::getAdditionalConfigFiles(),
            [__DIR__ . '/../../../rules.neon']
        );
    }
}
