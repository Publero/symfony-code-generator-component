<?php
namespace Publero\Component\CodeGenerator\Tests;

use Publero\Component\CodeGenerator\CustomAlphabetCodeGenerator;

class CustomAlphabetCodeGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    const TEST_ALPHABET = 'abcdef';

    /**
     * @var int
     */
    const TEST_LENGTH = 5;

    /**
     * @var CustomAlphabetCodeGenerator
     */
    private $generator;

    protected function setUp()
    {
        $this->generator = new CustomAlphabetCodeGenerator(self::TEST_ALPHABET, self::TEST_LENGTH);
    }

    public function testConstructorAndGetAndSetAlphabetAndLength()
    {
        $this->assertEquals(self::TEST_ALPHABET, $this->generator->getAlphabet());
        $this->assertEquals(self::TEST_LENGTH, $this->generator->getLength());
    }

    public function testSetAlphabetArray()
    {
        $this->generator->setAlphabet(array('a', 'b', 'cd'));

        $this->assertEquals('abcd', $this->generator->getAlphabet());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetAlphabetNull()
    {
        $this->generator->setAlphabet(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetAlphabetEmpty()
    {
        $this->generator->setAlphabet('');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetAlphabetNotStringOrArray()
    {
        $this->generator->setAlphabet(new \DateTime());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetLengthZero()
    {
        $this->generator->setLength(0);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetLengthNegative()
    {
        $this->generator->setLength(-1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetLengthNotNumber()
    {
        $this->generator->setLength('not_a_number');
    }

    public function testGenerate()
    {
        $alphabet = $this->generator->getAlphabet();
        $length = $this->generator->getLength();

        $codes = array();
        for ($i = 0; $i < 10; $i++) {
            $code = $this->generator->generate();

            $this->assertRegExp('/^[' . $alphabet . ']{' . $length . '}$/', $code);
            $this->assertNotContains($code, $codes);

            $codes[] = $code;
        }
    }
}
