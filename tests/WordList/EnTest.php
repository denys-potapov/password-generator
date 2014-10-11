<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class EnTest extends \PHPUnit_Framework_TestCase
{
    public function testEn()
    {
        $wordList = new WordList\En();
        $this->assertEquals('spread', $wordList->get(1));
    }
    
    public function testEnNouns()
    {
        $wordList = new WordList\En\Nouns();
        $this->assertEquals('glamor', $wordList->get(1));
    }
    
    public function testEnVerbs()
    {
        $wordList = new WordList\En\Verbs();
        $this->assertEquals('impale', $wordList->get(1));
    }

    public function testEnAdjectives()
    {
        $wordList = new WordList\En\Adjectives();
        $this->assertEquals('harmonic', $wordList->get(1));
    }
}
