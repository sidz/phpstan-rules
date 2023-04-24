<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAsFunctionArgumentRule;

final class NoMagicNumberAsFunctionArgumentRuleTest extends AbstractMagicNumberTest
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
        return self::getContainer()->getService('NoMagicNumberAsFunctionArgumentRule');
    }
}
