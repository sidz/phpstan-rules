<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Arg>
 */
final class NoMagicNumberAsFunctionArgumentRule extends AbstractMagicNumberRule
{
    public const ERROR_MESSAGE = 'Do not use magic number as a function argument. Move to constant with a suitable name.';

    public function getNodeType(): string
    {
        return Node\Arg::class;
    }

    /**
     * @param Node\Arg $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if ($this->isNumber($node->value)) {
            return [
                RuleErrorBuilder::message(self::ERROR_MESSAGE)->line($node->getLine())->build(),
            ];
        }

        return [];
    }
}
