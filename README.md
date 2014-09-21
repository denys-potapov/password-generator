PHP password generator
==================

[![Build Status](https://travis-ci.org/denys-potapov/password-generator.png?branch=master)](https://travis-ci.org/denys-potapov/password-generator )
[![Total Downloads](https://poser.pugx.org/barzo/password-generator/downloads.png)](https://packagist.org/packages/barzo/password-generator)

PHP library for generating easy to remember, but hard to quess passwords.
Inspired by [xkcd comic](http://xkcd.com/936/), library generates phrases from frequently used words. Contains different word lists:

* Common English words (example "idea critic happy chinese")
* Common Russian words (example "порошок земля нуль платье")
* Common Russian transliterated (example "vysota razum bumazhka razmer")

[Try online](http://denyspotapov.com/password/)

## Install

Via Composer

``` json
{
    "require": {
        "barzo/password-generator": "dev-master"
    }
}
```

## Usage

Generate password from English words list with default length (4 words) and default separator (space)
``` php
// would output something like "idea critic happy chinese"
echo Barzo\Password\Generator::generateEn();
```

Generate password with implict word list and params

``` php
$wordList = new Barzo\Password\WordList\RuTranslit();

// would output something like "dovod-gore-sever-nomer-druzhka"
echo Generator::generate($wordList, 5, '-');
```

## Advanced usage

Call static function Generator::generate to generate passwords from wordlists. Params

- *wordlists* - array of WordListInterface. If array is shorter then length, function 
  would iterate from the beginning of array.
- *lenght* - password length in words. Default - 4
- *separator* - words separator. Default - ' '(space)

Example:

``` php
echo Generator::generate(
    [
        new Barzo\Password\WordList\En(), 
        new Barzo\Password\WordList\RuTranslit()
    ],
    5, 
    '-'
);

// would output something like "idea-dovod-critic-sever-happy"
```
## Word lists

### English (WordList\En)

Example - **idea critic happy chinese**. List of 2048 most frequently used English words ([source](http://www.wordfrequency.info/top5000.asp))

``` php
// using short syntax
echo Barzo\Password\Generator::generateEn();

//  equivalent
$wordList = new Barzo\Password\WordList\En();
echo Generator::generate($wordList);
```

### Russian Transliterated (WordList\RuTranslit)
Example - **vysota razum bumazhka razmer**. List of 2048 most frequently used Russain nouns ([source](http://dict.ruslang.ru/freq.php)). Words with "hard" to transliterate letters (ц, щ, ь, ъ) excluded.

``` php
// using short syntax
echo Barzo\Password\Generator::generateRuTranslit();

//  equivalent
$wordList = new Barzo\Password\WordList\RuTranslit();
echo Generator::generate($wordList);
```

### Russian (WordList\Ru)
Example - **порошок земля нуль платье**. List of 2048 most frequently used Russain nouns ([source](http://dict.ruslang.ru/freq.php)). 

``` php
// using short syntax
echo Barzo\Password\Generator::generateRu();

//  equivalent
$wordList = new Barzo\Password\WordList\Ru();
echo Generator::generate($wordList);
```

## Security

If OpenSSL extension avaivable library would use [openssl_random_pseudo_bytes](http://php.net/manual/en/function.openssl-random-pseudo-bytes.php) for random number generation.

## Testing

``` bash
$ php vendor/bin/phpunit
```

## Contributing

To add new language open an issue with link to frequency dictionary.

Pull requests are welcome. 

## Credits

- [All Contributors](https://github.com/denys-potapov/password-generator/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/denys-potapov/password-generator/blob/master/LICENSE) for more information.
