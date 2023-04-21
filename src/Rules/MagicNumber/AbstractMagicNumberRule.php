<?php

declare(strict_types=1);

namespace Sid\PHPStan\Rules\MagicNumber;

use function in_array;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PHPStan\Rules\Rule;

abstract class AbstractMagicNumberRule implements Rule
{
    /**
     * @var list<numeric>
     */
    private $ignoreMagicNumbers;

    /**
     * @param list<numeric> $ignoreMagicNumbers
     */
    public function __construct(array $ignoreMagicNumbers = [])
    {
        $this->ignoreMagicNumbers = $ignoreMagicNumbers;
    }

    protected function isNumber(?Expr $expr): bool
    {
        $isNumber = $expr instanceof LNumber
            || $expr instanceof DNumber
            || $expr instanceof Expr\UnaryMinus;

        return $isNumber && !$this->ignoreNumber($expr);
    }

    /**
     * @param LNumber|DNumber $scalar
     */
    private function ignoreNumber(Expr $scalar): bool
    {
        return in_array($scalar->value, $this->ignoreMagicNumbers, true);
    }
}
