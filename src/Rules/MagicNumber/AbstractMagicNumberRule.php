<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use function in_array;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use PHPStan\Rules\Rule;

abstract class AbstractMagicNumberRule implements Rule
{
    /**
     * @param list<numeric> $ignoreMagicNumbers
     */
    public function __construct(
        private readonly array $ignoreMagicNumbers = [],
        private readonly bool $ignoreNumericStrings = false,
    ) {
    }

    protected function isNumeric(?Expr $expr): bool
    {
        $isNumber = $expr instanceof LNumber
            || $expr instanceof DNumber
            || ($expr instanceof Expr\UnaryMinus && $this->isNumeric($expr->expr))
            || ($expr instanceof Expr\UnaryPlus && $this->isNumeric($expr->expr))
            || ($expr instanceof Expr\Cast\String_ && $this->isNumeric($expr->expr))
            || $this->isNumericString($expr);

        return $isNumber && !$this->ignoreNumber($expr);
    }

    /**
     * @param LNumber|DNumber $scalar
     */
    private function ignoreNumber(Expr $scalar): bool
    {
        return in_array((string) $scalar->value, array_map('strval', $this->ignoreMagicNumbers), true);
    }

    private function isNumericString(?Expr $expr): bool
    {
        return !$this->ignoreNumericStrings
            && $expr instanceof String_
            && is_numeric($expr->value);
    }
}
