<?php

$input = 3;

match (3) {
    1 => 'Hi',
    2, 4 => 'There',
    '1', 5 => 'magic number after string',
    default => throw new LogicException(),
    0 => 'Hello',
};
