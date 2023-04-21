<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInLogicalOperatorRule;

final class NoMagicNumberInLogicalOperatorRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/bitwise-logical-cases.php'],
            [
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    9,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    11,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    25,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    27,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    49,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    51,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInLogicalOperatorRule');
    }
}
