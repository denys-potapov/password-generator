<?php

namespace Barzo\Password\Test;

use Barzo\Password\WordList;

class RuTranslitTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLast()
    {
        $wordList = new WordList\RuTranslit();
        $this->assertEquals('ledi', $wordList->get(1));
    }
}
