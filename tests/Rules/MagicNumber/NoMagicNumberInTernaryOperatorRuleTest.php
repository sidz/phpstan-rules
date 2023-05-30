<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInTernaryOperatorRule;

final class NoMagicNumberInTernaryOperatorRuleTest extends AbstractMagicNumberTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/ternary-cases.php'],
            [
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    6,
                ],
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    8,
                ],
                [
                    NoMagicNumberInTernaryOperatorRule::ERROR_MESSAGE,
                    10,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInTernaryOperatorRule');
    }
}
