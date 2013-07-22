<?php
namespace Publero\Component\CodeGenerator\Tests;

use Publero\Component\CodeGenerator\SequenceGenerator;
use Publero\CoreBundle\Entity\System\Generator;

class SequenceGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->objectManagerMock = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        //$this->objectManagerMock
    }

    /**
     * @dataProvider generatorProvider
     */
    public function testGenerate($generator, $results)
    {
        $generatorObject = new SequenceGenerator($this->objectManagerMock, $generator);
        $resultCount = count($results);
        $this->objectManagerMock
            ->expects($this->exactly($resultCount))
            ->method('persist')
        ;

        $this->objectManagerMock
            ->expects($this->exactly($resultCount))
            ->method('flush')
        ;

        foreach ($results as $result) {
            $this->assertEquals($result, $generatorObject->generate());
        }
    }

    public function generatorProvider()
    {
        return [
            [
                (new Generator())
                    ->setStep(1)
                    ->setValue(0),
                [1,2,3,4,5,6,7]
            ],
            [
                (new Generator())
                    ->setStep(5)
                    ->setValue(0),
                [5,10,15,20,25,30,35]
            ],
            [
                (new Generator())
                    ->setStep(-1)
                    ->setValue(0),
                [-1,-2,-3,-4,-5,-6,-7]
            ],
        ];
    }
}
