<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAsFunctionArgumentRule;

final class NoMagicNumberAsFunctionArgumentRuleTest extends AbstractMagicNumberTestCase
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
                    18,
                ],
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    29,
                ],
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    31,
                ],
                [
                    NoMagicNumberAsFunctionArgumentRule::ERROR_MESSAGE,
                    33,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberAsFunctionArgumentRule');
    }
}
