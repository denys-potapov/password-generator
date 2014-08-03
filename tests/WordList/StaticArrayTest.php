<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class StaticArrayTest extends \PHPUnit_Framework_TestCase
{

    public function testGetFirst()
    {
        $wordList = new WordList\StaticArray();
        $this->assertEquals('correct', $wordList->get(0));
    }

    public function testGetLast()
    {
        $wordList = new WordList\StaticArray();
        $this->assertEquals('staple', $wordList->get(1));
    }
}
