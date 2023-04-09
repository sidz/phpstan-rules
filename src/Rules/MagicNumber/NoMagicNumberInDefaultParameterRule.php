<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Param>
 */
final class NoMagicNumberInDefaultParameterRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number as default parameter. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Param::class;
    }

    /**
     * @param Node\Param $node
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
