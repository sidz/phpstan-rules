<?php

$var1 + 2;

$var2 - .3;

$var3 * 2.2;

$var4 / 2;

$var5 % 1000;

$var6 ** 2;

2 + $var1;

1.1 - $var2;

2 * $var3;

-2 / $var4;

1000 % $var5;

function test(): void
{
    2 ** $var6;
}

const TWO = 2;

function test(): void
{
    TWO ** $var6;
}

$var1 . 2;


$var + '2';

'2' + $var;

$var + (string) 123;
