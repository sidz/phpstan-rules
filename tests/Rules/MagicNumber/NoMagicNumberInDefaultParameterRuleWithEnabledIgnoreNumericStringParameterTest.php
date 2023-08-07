<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInDefaultParameterRule;

final class NoMagicNumberInDefaultParameterRuleWithEnabledIgnoreNumericStringParameterTest extends AbstractMagicNumberTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/class-cases.php'],
            [
                [
                    NoMagicNumberInDefaultParameterRule::ERROR_MESSAGE,
                    11,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberInDefaultParameterRule([], true);
    }
}
