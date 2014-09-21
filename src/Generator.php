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
        $bytes = openssl_random_pseudo_bytes($length * 4);
        $longs = unpack('L*', $bytes);
        $result = array();
        foreach ($longs as $long) {
            // should check if this division doesn't affects
            // the random distirbution
            $result[] = $long / 0xffffffff;
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
  	 * Static function to generate password
  	 * 
  	 * @param  WordListInterface $wordList  word list
  	 * @param  integer           $lenght    password length (number of words). Default - 4
  	 * @param  string            $separator word separator. Default ' ' (space)
  	 * @return string                       generated password
  	 */
    public static function generate(WordListInterface $wordList, $lenght = 4, $separator = ' ')
    {
        $words = array();
        $randomArray = self::getRandomArray($lenght);
        foreach ($randomArray as $random) {
            $words[] = $wordList->get($random);
        }
        
        return join($separator, $words);
    }

    /**
     * Static function to generate password with Russian transliterated words
     * Uses Password\WordList\RuTranslit
     * 
     * @param  integer           $lenght    password length (number of words). Default - 4
     * @param  string            $separator word separator. Default ' ' (space)
     * @return string                       generated password
     */
    public static function generateRuTranslit($lenght = 4, $separator = ' ')
    {
        return self::generate(new WordList\RuTranslit(), $lenght, $separator);
    }

    /**
     * Static function to generate password with Russian words
     * Uses Password\WordList\Ru
     * 
     * @param  integer           $lenght    password length (number of words). Default - 4
     * @param  string            $separator word separator. Default ' ' (space)
     * @return string                       generated password
     */
    public static function generateRu($lenght = 4, $separator = ' ')
    {
        return self::generate(new WordList\Ru(), $lenght, $separator);
    }

    /**
     * Static function to generate password with english words
     * Uses Password\WordList\En
     * 
     * @param  integer           $lenght    password length (number of words). Default - 4
     * @param  string            $separator word separator. Default ' ' (space)
     * @return string                       generated password
     */
    public static function generateEn($lenght = 4, $separator = ' ')
    {
        return self::generate(new WordList\En(), $lenght, $separator);
    }
}
