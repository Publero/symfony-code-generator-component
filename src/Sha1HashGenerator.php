<?php

/*
 * This file is part of the Publero Code Generator package.
 *
 * (c) Tomáš Pecsérke <tomas.pecserke@publero.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
