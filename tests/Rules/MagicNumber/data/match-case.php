<?php

$input = 3;

match (3) {
    1 => 'Hi',
    2, 4 => 'There',
    default => throw new LogicException(),
    0 => 'Hello',
};
