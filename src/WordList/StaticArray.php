<?php

namespace Barzo\Password\WordList;

use Barzo\Password\WordListInterface;

/**
 * Word list stored in static array.
 *
 * Do not use this class directly. Use it ancestors.
 */
class StaticArray implements WordListInterface
{
    /**
     * array of words
     * @var array
     */
    protected static $words = array('correct', 'horse', 'battery', 'staple');
  
    /**
     * {@inheritdoc}
     */
    public function get($random)
    {
        $length = count(static::$words);
        $position = $random * ($length - 1);

        return static::$words[$position];
    }
}
