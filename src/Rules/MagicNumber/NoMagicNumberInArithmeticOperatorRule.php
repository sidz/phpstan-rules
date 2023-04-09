<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\BinaryOp>
 */
final class NoMagicNumberInArithmeticOperatorRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number in arithmetic operations. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Expr\BinaryOp::class;
    }

    /**
     * @param Node\Expr\BinaryOp $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->canProcess($node)) {
            return [];
        }

        if (!$this->isNumber($node->left) && !$this->isNumber($node->right)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($node->getLine())->build(),
        ];
    }

    private function canProcess(Node $node): bool
    {
        return $node instanceof BinaryOp\Plus
            || $node instanceof BinaryOp\Minus
            || $node instanceof BinaryOp\Mul
            || $node instanceof BinaryOp\Div
            || $node instanceof BinaryOp\Mod
            || $node instanceof BinaryOp\Pow;
    }
}
