<?php

function test(int $i)
{
    return $i;
}

test(10);

class Test
{
    public function __construct($value = '123')
    {
    }

    public function first(int $i)
    {
        $this->second(10.34);

        return $i;
    }

    private function second(float $i)
    {
        return $i;
    }
}

(new Test())->first(15);

(new Test((string) 123));

(new Test('123'));

(new Test('string'));

(new Test(null));

(new Test(new stdClass()));
