<?php

namespace KKiernan;

class CaesarCipher
{
    /**
     * Code readability helper.
     */
    const IN_REVERSE = true;

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
     * Attempts to brute force the key.
     *
     * @param string $ciphertext
     *
     * @return int
     */
    public function crack($ciphertext)
    {
        $frequencies = [];

        for ($i = 0; $i < 26; $i++) {
            $plaintext = $this->decrypt($ciphertext, $i);

            $frequencies[$i] = substr_count(strtolower($plaintext), 'e');
        }

        return array_search(max($frequencies), $frequencies);
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
