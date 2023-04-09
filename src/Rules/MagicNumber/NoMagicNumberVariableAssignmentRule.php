<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\Assign>
 */
final class NoMagicNumberVariableAssignmentRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not assign magic number to variable. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Expr\Assign::class;
    }

    /**
     * @param Node\Expr\Assign $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->isNumber($node->expr)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($node->getLine())->build(),
        ];
    }
}
