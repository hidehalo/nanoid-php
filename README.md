# Nanoid-php

[![Build Status](https://travis-ci.org/hidehalo/emoji.svg)](https://travis-ci.org/hidehalo/nanoid-php)

Thanks awesome [ai](https://github.com/ai) and his [nanoid](https://github.com/ai/nanoid), this package is a copy in PHP!
If you like nanoid and you want to use it in PHP, try me :D

## Install

Via Composer

``` bash
$ composer require hidehalo/nanoid-php
```

## Usage

``` php
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;
# Construct client
$client = new Client();
# Use normal random generator
echo $client->generateId($size = 22);
# Use better random generator
echo $client->generateId($size = 22, $mode = Client::MODE_DYNAMIC)
# Use core algorithm as well
echo $client->formatedId($alphabet = '0123456789abcdefg', $size = 22);
# Or you want to use custom random bytes generator
# PS: anonymous class it new feature when PHP_VERSION >= 7.0
echo $client->formatedId($alphabet = '0123456789abcdefg', $size = 22,
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

## Examples

Please see [Examples](examples) for more information on detailed usage.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
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