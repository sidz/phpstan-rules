<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInReturnStatementRule;

final class NoMagicNumberInReturnStatementRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/class-cases.php'],
            [
                [
                    NoMagicNumberInReturnStatementRule::ERROR_MESSAGE,
                    11,
                ],
                [
                    NoMagicNumberInReturnStatementRule::ERROR_MESSAGE,
                    16,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberInReturnStatementRule');
    }
}
