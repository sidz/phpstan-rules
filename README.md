# phpstan-rules

[![Continuous Integration](https://github.com/sidz/phpstan-rules/workflows/Continuous%20Integration/badge.svg)](https://github.com/sidz/phpstan-rules/actions)

Provides additional rules for [`phpstan/phpstan`](https://github.com/phpstan/phpstan).

## Installation

Run

```sh
composer require --dev sidz/phpstan-rules
```

If you use [PHPStan extension installer](https://github.com/phpstan/extension-installer), you're all set. If not, you need to manually register all the rules in your `phpstan.neon`:

```neon
includes:
    - vendor/sidz/phpstan-rules/rules.neon
```

Each rule by default ignores the following numbers: `0` and `1`. This can be configured by adding the following parameter to your `phpstan.neon`:

```neon
parameters:
	sidzIgnoreMagicNumbers: [0, 1, 100]
```

Each rule by default detects numeric strings like `'12'` in source code. This behavior could be disabled via parameter:

```neon
parameters:
	sidzIgnoreNumericStrings: true
```

## Ignoring particular rules

If you need to ignore particular rule, for example `NoMagicNumberInComparisonOperatorRule`, you can do so by using built-in `ignoreErrors` parameter:

```neon
parameters:
    ignoreErrors:
        - '#^Do not use magic number in comparison operations\. Move to constant with a suitable name\.$#'
```

If you need to ignore this rule only for particular file or folder, this also can be done by using `ignoreErrors` parameter:

```neon
parameters:
    ignoreErrors:
        -
            message: '#^Do not use magic number in comparison operations\. Move to constant with a suitable name\.$#'
            path: src/SomeFolder/*
```

And finally, if you want to ignore all the rules from this package for particular files or folders, add this to `phpstan.neon`:

```neon
parameters:
    ignoreErrors:
        -
            message: '#Do not (use|return|assign) magic number (.)#'
            paths:
                - src/DataFixtures/*
                - tests/*
```

## Rules

This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):

- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAsFunctionArgumentRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberasfunctionargumentrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberAssignedToPropertyRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberassignedtopropertyrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInArithmeticOperatorRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinarithmeticoperatorrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInBitwiseOperatorRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinbitwiseoperatorrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInComparisonOperatorRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberincomparisonoperatorrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInDefaultParameterRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberindefaultparameterrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInLogicalOperatorRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinlogicaloperatorrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInMatchRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinmatchrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInReturnStatementRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinreturnstatementrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInSwitchCaseRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinswitchcaserule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberInTernaryOperatorRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumberinternaryoperatorrule)
- [`Sid\PHPStan\Rules\MagicNumber\NoMagicNumberVariableAssignmentRule`](https://github.com/sidz/phpstan-rules#magicnumbernomagicnumbervariableassignmentrule)


### Classes

#### `MagicNumber\NoMagicNumberAsFunctionArgumentRule`

This rule reports an error when magic number is used as function argument:

```php
<?php

some_function(10);
```

#### `MagicNumber\NoMagicNumberAssignedToPropertyRule`

This rule reports an error when magic number is assigned to class property:

```php
<?php

class Test
{
    private $prop1 = 10;

    private $prop2 = -5.5;
}
```

#### `MagicNumber\NoMagicNumberInArithmeticOperatorRule`

This rule reports an error when magic number is used in various arithmetic operators:

```php
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
```

#### `MagicNumber\NoMagicNumberInBitwiseOperatorRule`

This rule reports an error when magic number is used in various bitwise operators:

```php
<?php

$a & 1;

$b | 2;

$c ^ 3;

$a << 4;

$b >> 5;

1 & $a;

2 | $b;

3 ^ $c;

4 << $a;

5 >> $b;

6 >> 7;
```

#### `MagicNumber\NoMagicNumberInComparisonOperatorRule`

This rule reports an error when magic number is used in comparison operator:

```php
<?php

$var1 === 1;

$var2 !== 2;

$var3 !== 3;

$var4 === 4.4;

$var5 !== -5;

$var6 < 6;

$var7 <= 7;

$var8 > .8;

$var9 >= 9;

$var10 <=> 0.1;

$var11 === 11;
```

#### `MagicNumber\NoMagicNumberInDefaultParameterRule`

This rule reports an error when magic number is used as default parameter:

```php
<?php

class Test
{
    public function testMethod($param = 3): string
    {
        return 'string';
    }
}
```

#### `MagicNumber\NoMagicNumberInLogicalOperatorRule`

This rule reports an error when magic number is used as part of logical operation:

```php
<?php

$a and 1;

1 and $a;

$b or 2;

2 or $b;

$c xor 3;

3 xor $c;
```

#### `MagicNumber\NoMagicNumberInMatchRule`

This rule reports an error when magic number is used in arms or conditions:

```php
<?php

match (3) {
    1 => 'Hi',
    2, 4 => 'There',
    default => throw new LogicException(),
};
```

#### `MagicNumber\NoMagicNumberInReturnStatementRule`

This rule reports an error when magic number is used in `return` statement:

```php
<?php

class Test
{

    public function getNegativeValue(): float
    {
        return -20.5;
    }
}
```

#### `MagicNumber\NoMagicNumberInSwitchCaseRule`

This rule reports an error when magic number is used in condition or cases:

```php
<?php

switch (100) {
    case 5:
        break;
}
```

#### `MagicNumber\NoMagicNumberInTernaryOperatorRule`

This rule reports an error when magic number is used in ternary operator:

```php
<?php

$a = $b ? 2 : 'string';

$c = $b ?: -3.5;

$d = $b ? 'string' : 6;
```

#### `MagicNumber\NoMagicNumberVariableAssignmentRule`

This rule reports an error when magic number is assigned to some variable:

```php
<?php

$var1 = 4;

$var2 = -2;

function test_func($var4 = 3): void
{
    $var5 = 0;
}

$var6 = .1;

$var7 = 3.5;

$var8 = -2.3;
```

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).
