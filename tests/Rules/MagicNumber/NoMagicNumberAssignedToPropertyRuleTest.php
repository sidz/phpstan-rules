<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAssignedToPropertyRule;

final class NoMagicNumberAssignedToPropertyRuleTest extends RuleTestCase
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/class-cases.php'],
            [
                [
                    NoMagicNumberAssignedToPropertyRule::ERROR_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberAssignedToPropertyRule::ERROR_MESSAGE,
                    7,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberAssignedToPropertyRule();
    }
}
