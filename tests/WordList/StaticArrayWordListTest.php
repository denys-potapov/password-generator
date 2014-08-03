<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class StaticArrayWordListTest extends \PHPUnit_Framework_TestCase
{

    public function testGetFirst()
    {
        $wordList = new WordList\StaticArrayWordList();
        $this->assertEquals('correct', $wordList->get(0));
    }

    public function testGetLast()
    {
        $wordList = new WordList\StaticArrayWordList();
        $this->assertEquals('staple', $wordList->get(1));
    }
}
