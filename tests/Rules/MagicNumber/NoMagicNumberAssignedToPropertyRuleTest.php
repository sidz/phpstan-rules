<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAssignedToPropertyRule;

final class NoMagicNumberAssignedToPropertyRuleTest extends AbstractMagicNumberTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/class-property-cases.php'],
            [
                [
                    NoMagicNumberAssignedToPropertyRule::ERROR_MESSAGE,
                    7,
                ],
                [
                    NoMagicNumberAssignedToPropertyRule::ERROR_MESSAGE,
                    9,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberAssignedToPropertyRule');
    }
}
