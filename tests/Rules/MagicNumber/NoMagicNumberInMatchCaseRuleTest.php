<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInMatchRule;

final class NoMagicNumberInMatchCaseRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        if (PHP_VERSION_ID < 80000) {
            self::markTestSkipped('match is not available in PHP < 8.0');
        }

        $this->analyse(
            [__DIR__ . '/data/match-case.php'],
            [
                [
                    NoMagicNumberInMatchRule::MATCH_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberInMatchRule::MATCH_ARM_COND_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberInMatchRule::MATCH_ARM_COND_MESSAGE,
                    7,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInMatchRule');
    }
}
