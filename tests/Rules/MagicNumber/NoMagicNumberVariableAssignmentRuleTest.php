<?php

declare(strict_types=1);

namespace Sid\PHPStan\Tests\Rules\MagicNumber;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Sid\PHPStan\Rules\MagicNumber\NoMagicNumberVariableAssignmentRule;

/**
 * @extends RuleTestCase<NoMagicNumberVariableAssignmentRule>
 */
final class NoMagicNumberVariableAssignmentRuleTest extends AbstractMagicNumberTestCase
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
                    12,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    15,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    17,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    19,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    29,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    35,
                ],
                [
                    NoMagicNumberVariableAssignmentRule::ERROR_MESSAGE,
                    37,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return self::getContainer()->getService('NoMagicNumberVariableAssignmentRule');
    }
}
