<?php

class Test
{
    private const CONST1 = 10;

    private $prop1 = 10;

    private $prop2 = -5.5;

    public function testMethod($param = 3): int
    {
        return 10;
    }

    public function getNegativeValue(): float
    {
        return -20.5;
    }

    public function returnOne(): int
    {
        return 1;
    }

    public function returnVoid(): void
    {
    }

    public function returnValueWithNegatedUnaryMinus(): int
    {
        return -(-1.1);
    }

    public function returnValueWithUnaryPlus(): int
    {
        return +1.1;
    }

    public function returnValueWithNegatedUnaryPlus(): int
    {
        return -(+1.1);
    }

    public function returnValueWithDoubleUnaryPlus(): int
    {
        return +(+1.1);
    }

    public function returnConstWithUnaryMinus(): int
    {
        return -self::CONST1;
    }

    public function returnConstWithNegatedUnaryMinus(): int
    {
        return -(-self::CONST1);
    }

    public function returnConstWithUnaryPlus(): int
    {
        return +self::CONST1;
    }
}
