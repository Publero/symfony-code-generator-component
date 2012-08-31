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

interface CodeGeneratorInterface
{
    /**
     * Returns pseudo-random string code
     *
     * @return string
     */
    public function generate();
}
