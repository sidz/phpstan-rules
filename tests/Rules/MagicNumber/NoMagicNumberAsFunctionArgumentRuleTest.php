<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAsFunctionArgumentRule;

final class NoMagicNumberAsFunctionArgumentRuleTest extends RuleTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/function-argument.php'],
            [
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    8,
                ],
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    14,
                ],
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    25,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberAsFunctionArgumentRule();
    }
}
