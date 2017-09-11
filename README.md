# Nanoid-php

Thanks awesome [ai](https://github.com/ai) and his [nanoid](https://github.com/ai/nanoid), this package is a copy in PHP!
If you like nanoid and you want to use it in PHP, try me :D

## Install

Via Composer

``` bash
$ composer require hidehalo/nanoid-php
```

## Usage

``` php
# construct client
$client = new \Hidehalo\Nanoid\Client();
# use normal random generator
echo $client->generate($size = 22);
# use better random generator
eho $client->generate($size = 22, $mode = \Hidehalo\Nanoid\Client::MODE_DYNAMIC)
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ ./vendor/bin/phpunit ./tests
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email tianchen_cc@yeah.net instead of using the issue tracker.

## Credits

- [hidehalo][https://github.com/hidehalo]
- [All Contributors][https://github.com/hidehalo/nanoid-php/graphs/contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.