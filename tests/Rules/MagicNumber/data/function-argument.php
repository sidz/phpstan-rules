<?php

function test(int $i)
{
    return $i;
}

test(10);

class Test
{
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
