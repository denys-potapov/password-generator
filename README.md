Phrase password generator
==================

[![Build Status](https://travis-ci.org/denys-potapov/password-generator.png?branch=master)](https://travis-ci.org/denys-potapov/password-generator )
[![Total Downloads](https://poser.pugx.org/barzo/password-generator/downloads.png)](https://packagist.org/packages/barzo/password-generator)

PHP library for generating easy to remember, but hard to quess passwords.
Inspired by [xkcd comic](http://xkcd.com/936/), library generates phrases from frequently used words: 

* English phrases (example "throat fast only idea")
* German phrases (examle "laut welt ganze liter")
* Russian phrases (example "тоже металл пора подача")
* Russian transliterated phrases (example "kater nekiy zabrat dazhe")

[Try online](http://denyspotapov.com/password/?en)

## Install

Via Composer

``` json
{
    "require": {
        "barzo/password-generator": "~0.4"
    }
}
```

## Basic usage

Generate password with default length (4 words) and default separator (space).

``` php
use Barzo\Password\Generator;

// would output something like "throat fast only idea"
echo Generator::generateEn();

// would output something like "laut welt ganze liter"
echo Generator::generateDe();

// would output something like "тоже металл пора подача"
echo Generator::generateRu();

// would output something like "kater nekiy zabrat dazhe"
echo Generator::generateRuTranslit();
```

Each of above functions accepts length and separator paramenetrs.

``` php
// would output something like "ritual-error-raise-arab-tail"
echo Barzo\Password\Generator::generateEn(5, '-');
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

### German

List of 2048 most frequently used german words([source](ttp://wortschatz.uni-leipzig.de/html/wliste.html)). Words with diacritic letters (ä, ö, ü) and eszett (ß) excluded.

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|-----------
**WordList\De**              | all words  | 4-6          | sich, nicht

### Russian Transliterated 

List of 2048 transliterated most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)). "Hard" to transliterate letters (ь, ъ) excluded. 

Class                                | Comment    | Word lenghth | Example 
------------------------------------ | -----------|--------------|---------------
**WordList\RuTranslit**              | all words  | 4-6          | chto, etot
**WordList\RuTranslit\Nouns**        | nouns      | 4-8          | chelovek, vremya
**WordList\RuTranslit\Verbs**        | verbs      | 4-8          | moch, skazat
**WordList\RuTranslit\Adjectives**   | adjectives | 4-8          | novyy, bolshoy

### Russian

Lists consist of 2048 most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)).

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|---------------
**WordList\Ru**              | all words  | 4-6          | быть, этот
**WordList\Ru\Nouns**        | nouns      | 4-8          | человек, время
**WordList\Ru\Verbs**        | verbs      | 4-8          | быть, мочь
**WordList\Ru\Adjectives**   | adjectives | 4-8          | новый, большой

## Security

If OpenSSL extension avaivable library would use [openssl_random_pseudo_bytes](http://php.net/manual/en/function.openssl-random-pseudo-bytes.php) for random number generation.

## Testing

``` bash
$ php vendor/bin/phpunit
```
## Changelog

### 0.4.0

- Updated **WordList\Ru**. Now only words with length from 4 to 6
- Updated **WordList\RuTranslit**. Now only words with length from 4 to 6
- Added German words list

## Contributing

To add new language open an issue with link to frequency dictionary.

Pull requests are welcome. 

## Credits

[All Contributors](https://github.com/denys-potapov/password-generator/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/denys-potapov/password-generator/blob/master/LICENSE) for more information.
