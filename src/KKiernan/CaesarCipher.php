<?php

namespace KKiernan;

class CaesarCipher
{
    /**
     * Code readability helper.
     */
    const IN_REVERSE = true;

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
        return $this->runAlgorithm($message, $key, self::IN_REVERSE);
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
        // Use the remainder for shifts of 26 or more.
        $shift = $shift % 25;

        // Get the ascii code for the given character.
        $asciiCode = ord(strtolower($char));

        // If character is not within a to z, return the original character.
        if ($asciiCode > 122 || $asciiCode < 97) {
            return $char;
        }

        // Get the shifted ascii code.
        $shiftedAsciiCode = $asciiCode + $shift;

        // If character is greater than z, wrap to the start of the alphabet.
        if ($shiftedAsciiCode > 122) {
            $shiftedAsciiCode = ($shiftedAsciiCode - 122) + 96;
        }

        // If character is less than a, wrap to end of alphabet.
        if ($shiftedAsciiCode < 97) {
            $shiftedAsciiCode = 123 - (97 - $shiftedAsciiCode);
        }

        // Return the shifted character.
        return chr($shiftedAsciiCode);
    }
}
