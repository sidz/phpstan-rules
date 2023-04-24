<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInArithmeticOperatorRule;

final class NoMagicNumberInArithmeticOperatorRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/arithmetic-cases.php'],
            [
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    3,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    9,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    11,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    13,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    15,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    17,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    19,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    21,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    23,
                ],
                [
                    NoMagicNumberInArithmeticOperatorRule::ERROR_MESSAGE,
                    27,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInArithmeticOperatorRule');
    }
}
