<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class RuTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLast()
    {
        $wordList = new WordList\Ru();
        $this->assertEquals('игла', $wordList->get(1));
    }
}
