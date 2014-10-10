<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class RuTranslitTest extends \PHPUnit_Framework_TestCase
{
    public function testRuTranslit()
    {
        $wordList = new WordList\RuTranslit();
        $this->assertEquals('vodit', $wordList->get(1));
    }

    public function testRuTranslitAdjectives()
    {
        $wordList = new WordList\RuTranslit\Adjectives();
        $this->assertEquals('ekstra', $wordList->get(1));
    }
    
    public function testRuTranslitNouns()
    {
        $wordList = new WordList\RuTranslit\Nouns();
        $this->assertEquals('kishka', $wordList->get(1));
    }

    public function testRuTranslitVerbs()
    {
        $wordList = new WordList\RuTranslit\Verbs();
        $this->assertEquals('bulkat', $wordList->get(1));
    }
}
