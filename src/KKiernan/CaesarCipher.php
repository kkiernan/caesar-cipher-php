<?php

namespace KKiernan;

class CaesarCipher
{
    /**
     * @var Analyzer
     */
    private $analyzer;

    /**
     * Code readability helper.
     */
    const IN_REVERSE = true;

    /**
     * Create a new caesar cipher instance.
     */
    public function __construct()
    {
        $this->analyzer = new Analyzer();
    }

    /**
     * Encrypts a message using the Caesar Cipher.
     *
     * @param string $message
     * @param integer $key
     *
     * @return string
     */
    public function encrypt($message, $key = 12)
    {
        return $this->run($message, $key);
    }

    /**
     * Decrypts a Caesar Cipher encrypted message.
     *
     * @param string $message
     * @param integer $key
     *
     * @return string
     */
    public function decrypt($message, $key = 12)
    {
        return $this->run($message, $key, self::IN_REVERSE);
    }

    /**
     * Determines the frequency analysis for a string.
     *
     * @param string $string
     *
     * @return array
     */
    public function frequencyAnalysis($string)
    {
        $characters = $this->analyzer->characters($string);

        $frequencies = [];

        foreach ($characters as $character) {
            $frequencies[$character] = $this->analyzer->characterFrequency($character, $string);
        }

        ksort($frequencies);

        print_r($frequencies);

        return $frequencies;
    }

    /**
     * Runs the algorithm to encrypt or decrypt the plaintext.
     *
     * @param bool $reverse
     *
     * @return void
     */
    protected function run($message, $key, $reverse = false)
    {
        $ciphertext = '';

        if ($reverse) {
            $key = -$key;
        }

        foreach (str_split($message) as $char) {
            $ciphertext .= $this->shift($char, $key);
        }

        return $ciphertext;
    }

    /**
     * Handles requests to shift a character by the given number of places.
     *
     * @param string $char
     * @param integer $shift
     *
     * @return string
     */
    protected function shift($char, $shift)
    {
        $shift = $shift % 25;
        $ascii = ord($char);
        $shifted = $ascii + $shift;

        if ($ascii >= 65 && $ascii <= 90) {
            return chr($this->wrapUppercase($shifted));
        }

        if ($ascii >= 97 && $ascii <= 122) {
            return chr($this->wrapLowercase($shifted));
        }

        return chr($ascii);
    }

    /**
     * Ensures uppercase characters outside the range of A-Z are wrapped to 
     * the start or end of the alphabet as needed.
     *
     * @param int $ascii
     *
     * @return int
     */
    protected function wrapUppercase($ascii)
    {
        // Handle character code that is less than A.
        if ($ascii < 65) {
            $ascii = 91 - (65 - $ascii);
        }
        
        // Handle character code that is greater than Z.
        if ($ascii > 90) {
            $ascii = ($ascii - 90) + 64;
        }

        // Return unchanged character code.
        return $ascii;
    }

    /**
     * Ensures lowercase characters outside the range of a-z are wrapped to 
     * the start or end of the alphabet as needed.
     *
     * @param int $ascii
     *
     * @return int
     */
    protected function wrapLowercase($ascii)
    {
        // Handle character code that is less than a.
        if ($ascii < 97) {
            $ascii = 123 - (97 - $ascii);
        }

        // Handle character code that is greater than z.
        if ($ascii > 122) {
            $ascii = ($ascii - 122) + 96;
        }

        // Return unchanged character code.
        return $ascii;
    }
}
