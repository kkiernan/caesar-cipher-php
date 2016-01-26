<?php

use KKiernan\CaesarCipher;

require dirname(__DIR__) . '/vendor/autoload.php';

$cipher = new CaesarCipher;

$key = 12;

$encrypted = $cipher->encrypt('You\'re two handfuls of soil thrown against the pavement. Why won\'t you grow?', $key);

echo $encrypted . "\n";

$decrypted = $cipher->decrypt($encrypted, $key);

echo $decrypted . "\n";
