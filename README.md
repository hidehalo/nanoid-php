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
# Construct client
$client = new \Hidehalo\Nanoid\Client();
# Use normal random generator
echo $client->generate($size = 22);
# Use better random generator
echo $client->generate($size = 22, $mode = \Hidehalo\Nanoid\Client::MODE_DYNAMIC)
# Use core algorithm as well
echo $client->format($alphabet = '0123456789abcdefg', $size = 22);
# Or you want to use custom random bytes generator
# PS: anonymous class it new feature when PHP_VERSION >= 7.0
echo $client->format($alphabet = '0123456789abcdefg', $size = 22, new class implements \Hidehalo\Nanoid\GeneratorInterface {
    /**
     * @inheritDoc
     */
    public function random($size) 
    {
        //TODO: implemenation ...
    }
}); 
```

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