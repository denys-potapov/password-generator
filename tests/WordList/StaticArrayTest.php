<?php

namespace Barzo\Password\Tests\WordList;

use Barzo\Password\WordList\StaticArray;

class StaticArrayTest extends \PHPUnit_Framework_TestCase
{

    public function testGetFirst()
    {
        $wordList = new StaticArray();
        $this->assertEquals('correct', $wordList->get(0));
    }

    public function testGetLast()
    {
        $wordList = new StaticArray();
        $this->assertEquals('staple', $wordList->get(1));
    }
}
