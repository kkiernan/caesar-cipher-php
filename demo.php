<?php

use KKiernan\CaesarCipher;

require 'vendor/autoload.php';

// $message = "the quick fox jumped over the lazy dog";
$message = "xyz";

$key = 1;

$encryptedMessage = CaesarCipher::encrypt($message, $key);

echo "Encrypted Message: " . $encryptedMessage . "\n";

$decryptedMessage = CaesarCipher::decrypt($encryptedMessage, $key);

echo "Decrypted Message: " . $decryptedMessage . "\n";
