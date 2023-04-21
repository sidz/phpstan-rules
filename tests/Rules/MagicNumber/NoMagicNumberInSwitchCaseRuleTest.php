<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInSwitchCaseRule;

final class NoMagicNumberInSwitchCaseRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/switch-case.php'],
            [
                [
                    NoMagicNumberInSwitchCaseRule::ERROR_CONDITION_MESSAGE,
                    3,
                ],
                [
                    NoMagicNumberInSwitchCaseRule::ERROR_MESSAGE,
                    4,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInSwitchCaseRule');
    }
}
