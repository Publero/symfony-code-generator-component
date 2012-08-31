<?php
namespace Publero\Component\CodeGenerator;

use Publero\Component\CodeGenerator\CodeGeneratorInterface;

class Md5HashGenerator implements CodeGeneratorInterface
{
    /**
     * Returns MD5 hash of pseudo-random string
     *
     * @return string
     */
    public function generate()
    {
        return md5(uniqid());
    }
}
