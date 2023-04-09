<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberVariableAssignmentRule;

/**
 * @extends RuleTestCase<NoMagicNumberVariableAssignmentRule>
 */
final class NoMagicNumberVariableAssignmentRuleTest extends RuleTestCase
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
                    9,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    12,
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
                    26,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoMagicNumberVariableAssignmentRule();
    }
}
