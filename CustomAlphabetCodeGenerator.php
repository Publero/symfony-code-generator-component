<?php
namespace Publero\Component\CodeGenerator;

use Publero\Component\CodeGenerator\CodeGeneratorInterface;

class CustomAlphabetCodeGenerator implements CodeGeneratorInterface
{
    /**
     * @var string
     */
    const DEFAULT_ALPHABET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * @var int
     */
    const DEFAULT_LENGTH = 10;

    /**
     * @var string
     */
    private $alphabet;

    /**
     * @var int
     */
    private $length;

    /**
     * @param string $alphabet
     * @param int $length
     */
    public function __construct($alphabet = self::DEFAULT_ALPHABET, $length = self::DEFAULT_LENGTH)
    {
        $this->setAlphabet($alphabet);
        $this->setLength($length);
    }

    /**
     * @return string
     */
    public function getAlphabet()
    {
        return $this->alphabet;
    }

    /**
     * @param string|string[] $alphabet    code alphabet; can't be null or empty
     * @throws \InvalidArgumentException
     */
    public function setAlphabet($alphabet)
    {
        if (empty($alphabet)) {
            throw new \InvalidArgumentException("alphabet can't be empty");
        }
        if (is_array($alphabet)) {
            $alphabet = implode($alphabet);
        }

        if (!is_string($alphabet)) {
            throw new \InvalidArgumentException("alphabet must be a string or an array of strings");
        }

        $this->alphabet = (string) $alphabet;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length    code length; must be positive integer
     * @throws \InvalidArgumentException
     */
    public function setLength($length)
    {
        if ($length <= 0) {
            throw new \InvalidArgumentException("code length must be greater than 0");
        }
        if (!is_int($length)) {
            throw new \InvalidArgumentException("code length must an integer");
        }

        $this->length = (int) $length;
    }

    /**
     * Returns pseudo-random code consisting of this generator alphabet letters and it's length
     *
     * @return string
     */
    public function generate()
    {
        $alphabetLastIndex = strlen($this->alphabet) - 1;
        $code = '';
        for ($i = 0; $i < $this->length; $i++) {
            $code .= $this->alphabet[rand(0, $alphabetLastIndex)];
        }

        return $code;
    }
}
