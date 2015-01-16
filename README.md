Phrase password generator
==================

[![Build Status](https://travis-ci.org/denys-potapov/password-generator.png?branch=master)](https://travis-ci.org/denys-potapov/password-generator )
[![Total Downloads](https://poser.pugx.org/barzo/password-generator/downloads.png)](https://packagist.org/packages/barzo/password-generator)

PHP library for generating easy to remember, but hard to quess passwords.
Inspired by [xkcd comic](http://xkcd.com/936/), library generates phrases from frequently used words: 

* English phrases (example "throat fast only idea")
* Russian phrases (example "куртка отдел сыграть доверие")
* Russian transliterated phrases (example "yunost osobo otnesti opyat")

[Try online](http://denyspotapov.com//password/?en)

## Install

Via Composer

``` json
{
    "require": {
        "barzo/password-generator": "~0.3"
    }
}
```

## Basic usage

Generate English password with default length and default separator. 

``` php
// would output something like "throat fast only idea"
echo Barzo\Password\Generator::generateEn();
```

Function accepts length and separator paramenetrs.

``` php
// would output something like "ritual-error-raise-arab-tail"
echo Barzo\Password\Generator::generateEn(5, '-');
```

Generate Russian password with default length (4 words) and default separator (space). 

``` php
// would output something like "куртка отдел сыграть доверие"
echo Barzo\Password\Generator::generateRu();
```

Generate russian transliterated password with default length and default separator. 

``` php
// would output something like "yunost osobo otnesti opyat"
echo Barzo\Password\Generator::generateRuTranslit();
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

### English

List of 2048 most frequently used English words.

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|-----------
**WordList\En**              | all words  | 4-6          | have, that
**WordList\En\Nouns**        | nouns      | 4-6          | time, year
**WordList\En\Verbs**        | verbs      | 4-6          | have, would
**WordList\En\Adjectives**   | adjectives | 4-8          | other, good

### Russian Transliterated 

List of 2048 transliterated most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)). "Hard" to transliterate letters (ь, ъ) excluded. 

Class                                | Comment    | Word lenghth | Example 
------------------------------------ | -----------|--------------|---------------
**WordList\RuTranslit**              | all words  | 4-7          | chto, etot
**WordList\RuTranslit\Nouns**        | nouns      | 4-8          | chelovek, vremya
**WordList\RuTranslit\Verbs**        | verbs      | 4-8          | moch, skazat
**WordList\RuTranslit\Adjectives**   | adjectives | 4-8          | novyy, bolshoy

### Russian

Lists consist of 2048 most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)).

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|---------------
**WordList\Ru**              | all words  | 4-7          | быть, этот
**WordList\Ru\Nouns**        | nouns      | 4-8          | человек, время
**WordList\Ru\Verbs**        | verbs      | 4-8          | быть, мочь
**WordList\Ru\Adjectives**   | adjectives | 4-8          | новый, большой

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

[All Contributors](https://github.com/denys-potapov/password-generator/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/denys-potapov/password-generator/blob/master/LICENSE) for more information.
