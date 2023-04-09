<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\Ternary>
 */
final class NoMagicNumberInTernaryOperatorRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number in ternary operator. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Expr\Ternary::class;
    }

    /**
     * @param Node\Expr\Ternary $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->isNumber($node->else) && $node->if !== null && !$this->isNumber($node->if)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($node->getLine())->build(),
        ];
    }
}
