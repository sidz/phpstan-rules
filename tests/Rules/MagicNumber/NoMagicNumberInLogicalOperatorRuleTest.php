<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInLogicalOperatorRule;

final class NoMagicNumberInLogicalOperatorRuleTest extends RuleTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/bitwise-logical-cases.php'],
            [
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    5,
                ],
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
                    21,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    25,
                ],
                [
                    NoMagicNumberInLogicalOperatorRule::ERROR_MESSAGE,
                    27,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberInLogicalOperatorRule();
    }
}
