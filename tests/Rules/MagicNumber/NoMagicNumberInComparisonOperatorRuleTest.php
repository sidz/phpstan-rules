<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInComparisonOperatorRule;

/**
 * @extends RuleTestCase<NoMagicNumberInComparisonOperatorRule>
 */
final class NoMagicNumberInComparisonOperatorRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/comparison-cases.php'],
            [
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    9,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    11,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    13,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    15,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    17,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    19,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    21,
                ],
                [
                    NoMagicNumberInComparisonOperatorRule::ERROR_MESSAGE,
                    23,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInComparisonOperatorRule');
    }
}
