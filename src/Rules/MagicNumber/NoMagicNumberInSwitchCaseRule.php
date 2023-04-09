<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Stmt\Switch_>
 */
final class NoMagicNumberInSwitchCaseRule extends AbstractMagicNumberRule
{
    public const ERROR_CONDITION_MESSAGE = 'Do not use magic number in case condition. Move to constant with a suitable name.';
    public const ERROR_MESSAGE = 'Do not use magic number in case statement. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Stmt\Switch_::class;
    }

    /**
     * @param Node\Stmt\Switch_ $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $messages = [];

        if ($this->isNumber($node->cond)) {
            $messages[] = RuleErrorBuilder::message(self::ERROR_CONDITION_MESSAGE)->line($node->cond->getLine())->build();
        }

        foreach ($node->cases as $case) {
            if (!$this->isNumber($case->cond)) {
                continue;
            }

            $messages[] = RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($case->getLine())->build();
        }

        return $messages;
    }
}
