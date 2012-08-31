<?php
namespace Publero\Component\CodeGenerator\Tests;

use Publero\Component\CodeGenerator\Sha1HashGenerator;

class Sha1HashGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new Sha1HashGenerator();

        $codes = array();
        for ($i = 0; $i < 10; $i++) {
            $code = $generator->generate();

            $this->assertRegExp('/^[a-f0-9]{40}$/', $code);
            $this->assertNotContains($code, $codes);

            $codes[] = $code;
        }
    }
}
