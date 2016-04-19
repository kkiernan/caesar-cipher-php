<?php

use KKiernan\CaesarCipher;

require dirname(__DIR__).'/vendor/autoload.php';

$continue = true;

$cipher = new CaesarCipher();

/*
|---------------------------------------------------------------------
| Encrypt Message
|---------------------------------------------------------------------
*/

function encrypt()
{
    global $cipher;

    echo 'Enter a message: ';
    $plaintext = fgets(STDIN);

    echo 'Enter a key (1 to 25): ';
    $key = fgets(STDIN);

    echo "Your encrypted message:\n";
    echo $cipher->encrypt($plaintext, $key)."\n";
}

/*
|---------------------------------------------------------------------
| Crack Ciphertext
|---------------------------------------------------------------------
*/

function crack()
{
    global $cipher;

    echo 'Enter an encrypted message: ';
    $ciphertext = fgets(STDIN);

    $key = $cipher->crack($ciphertext);

    echo "\n".$cipher->decrypt($ciphertext, $key);
}

/*
|---------------------------------------------------------------------
| Main Loop
|---------------------------------------------------------------------
*/

while ($continue) {
    echo "Enter an option:\n1. Encrypt\n2. Crack\n3. Exit\n";

    $selection = fgets(STDIN);

    switch ($selection) {
        case 1:
            encrypt();
            break;

        case 2:
            crack();
            break;

        case 3:
            $continue = false;
            echo 'Goodbye!';
            break;

        default:
            echo "I'm sorry, please select a valid option.\n";
            break;
    }
}
