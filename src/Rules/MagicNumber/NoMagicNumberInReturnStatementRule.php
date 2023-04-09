<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Stmt\Return_>
 */
final class NoMagicNumberInReturnStatementRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not return magic number. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Stmt\Return_::class;
    }

    /**
     * @param Node\Stmt\Return_ $node
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
