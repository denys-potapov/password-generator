<?php

namespace Barzo\Password;

use Barzo\Password\WordList;

/**
 * Password generator. Generates passwords from wordlist passed
 * as WordListInterface
 */
class Generator
{
    /**
     * Get array of random numbers between 0.0 - 1.0
     * Uses openssl_random_pseudo_bytes as random funciton
     *  
     * @param  integer $length array length
     * @return float[]         array of random values 0.0 - 1.0
     */
    public static function getStrongRandomArray($length)
    {
        $bytes = openssl_random_pseudo_bytes($length * 2);
        $longs = unpack('S*', $bytes);
        $result = array();
        foreach ($longs as $long) {
            // should check if this division doesn't affects
            // the random distirbution
            $result[] = $long / 0xffff;
        }

        return $result;
    }

    /**
     * Get array of random numbers between 0.0 - 1.0
     * Uses mt_rand as random funciton.
     * 
     * @param  integer $length array length
     * @return float[]         array of random values 0.0 - 1.0
     */
    public static function getMtRandomArray($length)
    {
        $result = array();
        foreach (range(1, $length) as $counter) {
            $result[] = mt_rand() / mt_getrandmax();
        }

        return $result;
    }

    /**
     * Get array of random numbers between 0.0 - 1.0
     * Uses openssl random generator if avaivable, mt_rand othervise
     * 
     * @param  integer $length array length
     * @return float[]         array of random values 0.0 - 1.0
     */
    public static function getRandomArray($length)
    {
        if (function_exists('openssl_random_pseudo_bytes')) {

            return self::getStrongRandomArray($length);
        }

        return self::getMtRandomArray($length);
    }
  
    /**
  	 * Static function to generate password from wordlists.
     *
     * If array of wordlist is shorter then length,
     * function would iterate from the beginning of array
  	 * 
  	 * @param  WordListInterface[] | WordListInterface 
     *                           $wordLists array of word lists or word list
  	 * @param  integer           $lenght    password length in words. Default - 4
  	 * @param  string            $separator word separator. Default - ' '(space)
  	 * @return string                       generated password
  	 */
    public static function generate($wordLists, $lenght = 4, $separator = ' ')
    {
        if (!is_array($wordLists)) {
            $wordLists = array($wordLists);
        }
        $wordListsLength = count($wordLists);

        $words = array();
        $randomArray = self::getRandomArray($lenght);
        foreach ($randomArray as $index => $random) {
            $wordList = $wordLists[$index % $wordListsLength];
            $words[] = $wordList->get($random);
        }
        
        return join($separator, $words);
    }

    /**
     * Static function generates transliterated Russian phrase password 
     * 
     * Password would consist of adjective, noun, verb and noun.
     * Example "proshlyy khutor osvoit pribyl"
     * 
     * @param  integer $lenght    password length (number of words). Default - 4
     * @param  string  $separator word separator. Default ' ' (space)
     * @return string             generated password
     */
    public static function generateRuTranslit($lenght = 4, $separator = ' ')
    {
        $adjectives = new WordList\RuTranslit\Adjectives();
        $nouns = new WordList\RuTranslit\Nouns();
        $verbs = new WordList\RuTranslit\Verbs();
        
        return self::generate(array($adjectives, $nouns, $verbs, $nouns), $lenght, $separator);
    }

    /**
     * Static function generates Russian phrase password.
     *
     * Password would consist of adjective, noun, verb and noun.
     * Example "парадный певец вступать юбка"
     * 
     * @param  integer $lenght    password length (number of words). Default - 4
     * @param  string  $separator word separator. Default ' ' (space)
     * @return string             generated password
     */
    public static function generateRu($lenght = 4, $separator = ' ')
    {
        $adjectives = new WordList\Ru\Adjectives();
        $nouns = new WordList\Ru\Nouns();
        $verbs = new WordList\Ru\Verbs();
        
        return self::generate(array($adjectives, $nouns, $verbs, $nouns), $lenght, $separator);
    }

    /**
     * Static function generates English phrase password.
     *
     * Password would consist of adjective, noun, verb and noun.
     * Example "ruling motion rock half"
     * 
     * @param  integer $lenght    password length (number of words). Default - 4
     * @param  string  $separator word separator. Default ' ' (space)
     * @return string             generated password
     */
    public static function generateEn($lenght = 4, $separator = ' ')
    {
        $adjectives = new WordList\En\Adjectives();
        $nouns = new WordList\En\Nouns();
        $verbs = new WordList\En\Verbs();

        return self::generate(array($adjectives, $nouns, $verbs, $nouns), $lenght, $separator);
    }
}
