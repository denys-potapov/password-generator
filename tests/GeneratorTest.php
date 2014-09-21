<?php

namespace Barzo\Password\Test;

use Barzo\Password\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetStrongRandomArray()
    {
        if (!function_exists('openssl_random_pseudo_bytes')) {
            $this->markTestSkipped('Open ssl extension unavaivable');
        }

        $array = Generator::getStrongRandomArray(2);
        $this->assertCount(2, $array);
        $this->assertGreaterThanOrEqual(0, $array[0]);
        $this->assertLessThanOrEqual(1, $array[0]);
    }

    public function testGetMtRandomArray()
    {
        $array = Generator::getMtRandomArray(2);
        $this->assertCount(2, $array);
        $this->assertGreaterThanOrEqual(0, $array[0]);
        $this->assertLessThanOrEqual(1, $array[0]);
    }

    public function testGetRandomArray()
    {
        $array = Generator::getRandomArray(2);
        $this->assertCount(2, $array);
    }

    public function testWordListCalled()
    {
        $wordList = $this->getMockForAbstractClass('Barzo\Password\WordListInterface');
        $wordList->expects($this->exactly(5))
                 ->method('get');

        Generator::generate($wordList, 5);
    }

    public function testWordListArrayCalled()
    {
        $wordList1 = $this->getMockForAbstractClass('Barzo\Password\WordListInterface');
        $wordList1->expects($this->exactly(2))->method('get');

        $wordList2 = $this->getMockForAbstractClass('Barzo\Password\WordListInterface');
        $wordList2->expects($this->exactly(1))->method('get');

        Generator::generate(array($wordList1, $wordList2), 3);
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

    public function testGenerateRuTranslit()
    {
        $password = Generator::generateRuTranslit(4, ' ');
        $this->assertNotEmpty($password);
    }

    public function testGenerateRu()
    {
        $password = Generator::generateRu(4, ' ');
        $this->assertNotEmpty($password);
    }

    public function testGenerateEn()
    {
        $password = Generator::generateEn(4, ' ');
        $this->assertNotEmpty($password);
    }
}
