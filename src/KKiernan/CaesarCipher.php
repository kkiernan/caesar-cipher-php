<?php

namespace KKiernan;

class CaesarCipher
{
    protected static $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    public static function encrypt($string, $key)
    {
        $ciphertext = '';

        $key = $key > 25 ? $key % 25 : $key;

        foreach (str_split($string) as $char) {
            if (!in_array($char, static::$alphabet)) {
                $ciphertext .= $char;
                continue;
            }

            $index = array_search($char, static::$alphabet);
            $shifted = ($index + $key) % 25 != 0 ? (($index + $key) % 25) - 1 : 25;
            $ciphertext .= static::$alphabet[$shifted];
        }

        return $ciphertext;
    }

    public static function decrypt($string, $key)
    {
        $plaintext = '';

        $key = $key > 25 ? $key % 25 : $key;

        foreach (str_split($string) as $char) {
            if (!in_array($char, static::$alphabet)) {
                $plaintext .= $char;
                continue;
            }

            // $index = array_search($char, static::$alphabet);
            // $shifted = $index - $key;
            // $shifted = $shifted < 0 ? (26 + $shifted) : $shifted;
            // $plaintext .= static::$alphabet[$shifted];
            
            $index = array_search($char, static::$alphabet);
            $shifted = ($index - $key) > 0 ? $index - $key : 26 - $key;
            $plaintext .= static::$alphabet[$shifted];
        }

        return $plaintext;
    }
}
