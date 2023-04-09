<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<BinaryOp>
 */
final class NoMagicNumberInBitwiseOperatorRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number in bitwise operations. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return BinaryOp::class;
    }

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
        return $node instanceof BinaryOp\BitwiseAnd
            || $node instanceof BinaryOp\BitwiseOr
            || $node instanceof BinaryOp\BitwiseXor
            || $node instanceof BinaryOp\ShiftLeft
            || $node instanceof BinaryOp\ShiftRight;
    }
}
