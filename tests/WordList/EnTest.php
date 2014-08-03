<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class EnTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLast()
    {
        $wordList = new WordList\En();
        $this->assertEquals('heaven', $wordList->get(1));
    }
}
