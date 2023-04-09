<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\Match_>
 */
final class NoMagicNumberInMatchRule extends AbstractMagicNumberRule
{
    public const MATCH_MESSAGE = 'Do not use magic number in match condition. Move to constant with a suitable name.';
    public const MATCH_ARM_COND_MESSAGE = 'Do not use magic number in match condition statement. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Expr\Match_::class;
    }

    /**
     * @param Node\Expr\Match_ $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $messages = [];

        if ($this->isNumber($node->cond)) {
            $messages[] = RuleErrorBuilder::message(self::MATCH_MESSAGE)->line($node->cond->getLine())->build();
        }

        foreach ($node->arms as $arm) {
            foreach ($arm->conds as $case) {
                if (!$this->isNumber($case)) {
                    continue;
                }

                $messages[] = RuleErrorBuilder::message(self::MATCH_ARM_COND_MESSAGE)->line($case->getLine())->build();
            }
        }

        return $messages;
    }
}
