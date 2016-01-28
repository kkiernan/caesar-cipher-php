<?php

use KKiernan\CaesarCipher;

require dirname(__DIR__) . '/vendor/autoload.php';

$cipher = new CaesarCipher();

$plaintext = 'Once upon a midnight dreary, while I pondered, weak and weary,
Over many a quaint and curious volume of forgotten lore,
While I nodded, nearly napping, suddenly there came a tapping,
As of some one gently rapping, rapping at my chamber door.
Tis some visitor," I muttered, "tapping at my chamber door —
Only this, and nothing more.';

$ciphertext = $cipher->encrypt($plaintext, 6);

echo "ENCRYPTED MESSAGE:\n"
     . "------------------\n"
     . $ciphertext
     . "\n\n";

$keyGuess = $cipher->crack($ciphertext);

echo "BEST GUESS AT KEY:\n"
     . "------------------\n"
     . $keyGuess
     . "\n\n";

echo "CRACKED MESSAGE ATTEMPT:\n"
     . "------------------------\n"
     . $cipher->decrypt($ciphertext, $keyGuess);
