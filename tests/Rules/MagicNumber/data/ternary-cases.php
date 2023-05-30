<?php

$b = true;
$string = 'string';

$a = $b ? 2 : 'string';

$c = $b ?: -3.5;

$d = $b ? 'string' : 6;

$d = $b ? 'string' : $string;

$d = $b ?: $string;
