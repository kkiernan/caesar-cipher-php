<?php

namespace KKiernan;

class CaesarCipher
{
    /**
     * Encrypt a message using the Caesar Cipher.
     *
     * @param string $message
     * @param integer $key
     *
     * @return string
     */
    public function encrypt($message, $key)
    {
        return $this->runAlgorithm($message, $key);
    }

    /**
     * Decrypt a Caesar Cipher encrypted message.
     *
     * @param string $message
     * @param integer $key
     *
     * @return string
     */
    public function decrypt($message, $key)
    {
        return $this->runAlgorithm($message, $key, true);
    }

    /**
     * Run the encryption algorithm.
     *
     * @param bool $reverse
     *
     * @return void
     */
    private function runAlgorithm($message, $key, $reverse = false)
    {
        $ciphertext = '';

        if ($reverse) {
            $key = -$key;
        }

        foreach (str_split($message) as $char) {
            $ciphertext .= $this->shiftCharacter($char, $key);
        }

        return $ciphertext;
    }

    /**
     * Shift a character by the given number of places. Note that we are using 
     * a basic interpretation of the Caesar Cipher shifting only lower case 
     * characters a through z. All other characters will be unchanged.
     *
     * @param string $char
     * @param integer $shift
     *
     * @return string
     */
    public function shiftCharacter($char, $shift)
    {
        $ascii = ord(strtolower($char));

        if ($ascii > 122 || $ascii < 97) {
            return $char;
        }

        $shifted = $ascii + $shift;

        if ($shifted > 122) {
            $shifted = ($shifted - 122) + 96;
        }

        if ($shifted < 97) {
            $shifted = 123 - (97 - $shifted);
        }

        return chr($shifted);
    }
}
