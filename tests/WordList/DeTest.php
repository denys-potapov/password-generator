<?php

namespace Barzo\Password\Tests\WordList;

use Barzo\Password\WordList;

class DeTest extends \PHPUnit_Framework_TestCase
{
    public function testDe()
    {
        $wordList = new WordList\De();
        $this->assertEquals('wehrt', $wordList->get(1));
    }
}
