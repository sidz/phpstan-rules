<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberVariableAssignmentRule;

/**
 * @extends RuleTestCase<NoMagicNumberVariableAssignmentRule>
 */
final class NoMagicNumberVariableAssignmentRuleTest extends AbstractMagicNumberTest
{
    public function test_rule(): void
    {
        $this->analyse(
            [__DIR__ . '/data/assignment-case.php'],
            [
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    3,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    5,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    11,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    14,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    16,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    18,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    28,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberVariableAssignmentRule');
    }
}
