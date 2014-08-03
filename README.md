password-generator
==================

[![Build Status](https://travis-ci.org/thephpleague/statsd.png?branch=master)](https://travis-ci.org/thephpleague/statsd)
[![Total Downloads](https://poser.pugx.org/barzo/password-generator/downloads.png)](https://packagist.org/packages/barzo/password-generator)

PHP library for generating easy to remember but hard to quess passwords.
Inspired by xkcd comics. Library has words list for differetnt languages

* English ()
* Russian ()
* Russian transliterated ()

## Install

Via Composer

``` json
{
    "require": {
        "league/:package_name": "~1.0"
    }
}
```


## Usage

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');

```


## Word lists

### WordList\Ru - Russian

### WordList\RuTranslit - Russian Transliterated

### WordList\En - English

List of 2048 most frequently used English words. Source:
http://www.wordfrequency.info/top5000.asp





## Testing

``` bash
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](https://github.com/thephpleague/:package_name/blob/master/CONTRIBUTING.md) for details.


## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](https://github.com/thephpleague/:package_name/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/thephpleague/:package_name/blob/master/LICENSE) for more information.
