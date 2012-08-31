<?php
namespace Publero\Component\CodeGenerator\Tests;

use Publero\Component\CodeGenerator\Md5HashGenerator;

class Md5HashGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new Md5HashGenerator();

        $codes = array();
        for ($i = 0; $i < 10; $i++) {
            $code = $generator->generate();

            $this->assertRegExp('/^[a-f0-9]{32}$/', $code);
            $this->assertNotContains($code, $codes);

            $codes[] = $code;
        }
    }
}
