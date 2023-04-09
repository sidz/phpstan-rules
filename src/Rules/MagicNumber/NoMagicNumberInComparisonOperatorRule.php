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
final class NoMagicNumberInComparisonOperatorRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number in comparison operations. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return BinaryOp::class;
    }

    /**
     * @param BinaryOp $node
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

    private function canProcess(BinaryOp $node): bool
    {
        return $node instanceof BinaryOp\Equal
            || $node instanceof BinaryOp\NotEqual
            || $node instanceof BinaryOp\Identical
            || $node instanceof BinaryOp\NotIdentical
            || $node instanceof BinaryOp\Greater
            || $node instanceof BinaryOp\GreaterOrEqual
            || $node instanceof BinaryOp\Smaller
            || $node instanceof BinaryOp\SmallerOrEqual
            || $node instanceof BinaryOp\Spaceship;
    }
}
