<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInDefaultParameterRule;

final class NoMagicNumberInDefaultParameterRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/class-cases.php'],
            [
                [
                    NoMagicNumberInDefaultParameterRule::ERROR_MESSAGE,
                    9,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInDefaultParameterRule');
    }
}
