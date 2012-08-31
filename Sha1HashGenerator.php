<?php
namespace Publero\Component\CodeGenerator;

use Publero\Component\CodeGenerator\CodeGeneratorInterface;

class Sha1HashGenerator implements CodeGeneratorInterface
{
    /**
     * Returns SHA1 hash of pseudo-random string
     *
     * @return string
     */
    public function generate()
    {
        return sha1(uniqid());
    }
}
