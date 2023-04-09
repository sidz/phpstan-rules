<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInBitwiseOperatorRule;

final class NoMagicNumberInBitwiseOperatorRuleTest extends RuleTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/bitwise-logical-cases.php'],
            [
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    3,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    13,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    15,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    17,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    19,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    23,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    29,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    31,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    33,
                ],
                [
                    NoMagicNumberInBitwiseOperatorRule::ERROR_MESSAGE,
                    35,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberInBitwiseOperatorRule();
    }
}
