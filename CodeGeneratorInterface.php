<?php
namespace Publero\Component\CodeGenerator;

interface CodeGeneratorInterface
{
    /**
     * Returns pseudo-random string code
     *
     * @return string
     */
    public function generate();
}
