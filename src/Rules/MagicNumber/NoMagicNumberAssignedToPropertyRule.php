<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Stmt\PropertyProperty>
 */
final class NoMagicNumberAssignedToPropertyRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not assign magic number to property. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Stmt\PropertyProperty::class;
    }

    /**
     * @param Node\Stmt\PropertyProperty $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if ($node->default === null || !$this->isNumber($node->default)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($node->getLine())->build(),
        ];
    }
}
