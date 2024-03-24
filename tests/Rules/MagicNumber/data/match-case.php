<?php

$input = 3;

match (3) {
    1 => 'Hi',
    2, 4 => 'There',
    'string in the middle', '5' => 'There',
    '1', 6 => 'magic number after string',
    default => throw new LogicException(),
    0 => 'Hello',
};
