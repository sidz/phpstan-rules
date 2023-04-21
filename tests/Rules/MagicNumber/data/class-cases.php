<?php

class Test
{
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
}
