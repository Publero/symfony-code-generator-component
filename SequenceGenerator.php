<?php

/*
 * This file is part of the Publero Code Generator package.
 *
 * (c) Jiří Horký <jiri.horky@publero.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Publero\Component\CodeGenerator;

use Doctrine\Common\Persistence\ObjectManager;
use Publero\Component\CodeGenerator\CodeGeneratorInterface;

class SequenceGenerator implements CodeGeneratorInterface
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager;
     */
    private $objectManager;

    /**
     * @var GeneratorEntity
     */
    private $generatorEntity;

    public function __construct(ObjectManager $objectManager, GeneratorEntity $generatorEntity)
    {
        $this->objectManager = $objectManager;
        $this->generatorEntity = $generatorEntity;
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        $nextValue = $this->generatorEntity->increment();

        $this->objectManager->persist($this->generatorEntity);
        $this->objectManager->flush($this->generatorEntity);

        return $nextValue;
    }
}
