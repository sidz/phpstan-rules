<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInTernaryOperatorRule;

final class NoMagicNumberInTernaryOperatorRuleTest extends RuleTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/ternary-cases.php'],
            [
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    9,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberInTernaryOperatorRule();
    }
}
