<?php

namespace Barzo\Password\Test;

use Barzo\Password\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function testWordListCalled()
    {
        $wordList = $this->getMockForAbstractClass('Barzo\Password\WordListInterface');
        $wordList->expects($this->exactly(5))
                 ->method('get');

        Generator::generate($wordList, 5);
    }

    public function testSeparator()
    {
        $wordList = $this->getMockForAbstractClass('Barzo\Password\WordListInterface');
        $wordList->expects($this->any())
                 ->method('get')
                 ->will($this->returnValue('test'));

        $password = Generator::generate($wordList, 4, '-');
        $this->assertEquals('test-test-test-test', $password);
    }
}
