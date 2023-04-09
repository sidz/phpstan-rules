<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PHPStan\Rules\Rule;

abstract class AbstractMagicNumberRule implements Rule
{
    protected function isNumber(?Expr $expr): bool
    {
        return $expr instanceof LNumber
            || $expr instanceof DNumber
            || $expr instanceof Expr\UnaryMinus;
    }
}
