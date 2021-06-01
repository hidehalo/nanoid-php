# Nanoid-php

[![Build Status](https://travis-ci.org/hidehalo/emoji.svg)](https://travis-ci.org/hidehalo/nanoid-php)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fhidehalo%2Fnanoid-php.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fhidehalo%2Fnanoid-php?ref=badge_shield)

> A tiny (179 bytes), secure URL-friendly unique string ID generator for JavaScript
>
> **Safe.** It uses cryptographically strong random APIs and guarantees a proper distribution of symbols.
>
> **Small.** Only 179 bytes (minified and gzipped). No dependencies. It uses Size Limit to control size.
>
> **Compact.** It uses more symbols than UUID (A-Za-z0-9_\-) and has the same number of unique options in just 21 symbols instead of 36.

Thanks awesome [ai](https://github.com/ai) and his [nanoid](https://github.com/ai/nanoid), this package is a copy in PHP!
If you like nanoid and you want to use it in PHP, try me :D

## Install

Via Composer

``` bash
composer require hidehalo/nanoid-php
```

## Usage

### Normal

> The main module uses URL-friendly symbols (A-Za-z0-9_\-) and returns an ID with 21 characters (to have the same collisions probability as UUID v4).

``` php
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

$client = new Client();

# default random generator
echo $client->generateId($size = 21);
# more safer random generator
echo $client->generateId($size = 21, $mode = Client::MODE_DYNAMIC);
```

### Custom Alphabet or Length

``` php
echo $client->formattedId($alphabet = '0123456789abcdefg', $size = 21);
```

> Alphabet must contain 256 symbols or less.
> Otherwise, the generator will not be secure.

### Custom Random Bytes Generator

``` php
# PS: anonymous class is new feature when PHP_VERSION >= 7.0
echo $client->formattedId($alphabet = '0123456789abcdefg', $size = 21,
new class implements GeneratorInterface {
    /**
     * @inheritDoc
     */
    public function random($size)
    {
        //TODO: implemenation ...
    }
});
```

> `random` callback must accept the array size and return an array with random numbers.
>
> If you want to use the same URL-friendly symbols with `format`,
> you can get default alphabet from the `url` module:

Please see [`CoreInterface::random(...)`](src/CoreInterface.php) for the core random API prototype and notes

## Examples

Please see [Examples](examples) for more information on detailed usage.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Notice

If you have any issues, just feel free and open it in this repository, thx!

## Credits

- [ai](https://github.com/ai)
- [hidehalo](https://github.com/hidehalo)
- [All Contributors](https://github.com/hidehalo/nanoid-php/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fhidehalo%2Fnanoid-php.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fhidehalo%2Fnanoid-php?ref=badge_large)
