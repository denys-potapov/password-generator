<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class RuTest extends \PHPUnit_Framework_TestCase
{
    public function testRu()
    {
        $wordList = new WordList\Ru();
        $this->assertEquals('посол', $wordList->get(1));
    }

    public function testRuNouns()
    {
        $wordList = new WordList\Ru\Nouns();
        $this->assertEquals('игла', $wordList->get(1));
    }

    public function testRuVerbs()
    {
        $wordList = new WordList\Ru\Verbs();
        $this->assertEquals('взломать', $wordList->get(1));
    }

    public function testRuAdjectives()
    {
        $wordList = new WordList\Ru\Adjectives();
        $this->assertEquals('амурный', $wordList->get(1));
    }
}
