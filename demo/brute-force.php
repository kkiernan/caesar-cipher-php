<?php

use KKiernan\CaesarCipher;

require dirname(__DIR__) . '/vendor/autoload.php';

$cipher = new CaesarCipher();

$message = 'gur rntyr syvrf ng qnja';
// $message = 'Ymnx kzshynts itjxs\'y htzsy tajwqfuuji xzgxywnslx. Xjj ymj jcfruqj gjqtb!';
// $message = 'Kwsjuzwk lzw sjjsq xgj s yanwf nsdmw sfv jwlmjfk lzw ugjjwkhgfvafy cwq ax kmuuwkkxmd';
// $message = 'Pda bkhhksejc pkkh whhkso ukq pk ajynulp w patp sepd w oeilha kbboap whcknepdi - whok gjksj wo Ywaown yeldan. Eb ukq wna qoejc 13 wo pda gau, pda naoqhp eo oeiehwn pk wj nkp13 ajynulpekj. Eb ukq qoa "cqaoo" wo pda gau, pda whcknepdi pneao pk bejz pda necdp gau wjz zaynulpo pda opnejc xu cqaooejc. E whok snkpa w oiwhh wnpeyha (sepd okqnya lqxheywpekj) wxkqp bejzejc pda necdp gau ej wj qjgjksj ykjpatp kb wj ajynulpaz patp.';

$frequencies = [];

for ($i = 0; $i < 26; $i++) {
    $decrypted = $cipher->decrypt($message, $i);
    $frequencies[$i] = substr_count(strtolower($decrypted), 'e');
}

$key = array_search(max($frequencies), $frequencies);

echo "The key may be: $key\n"
     . "Your message may be: \n"
     . $cipher->decrypt($message, $key)
     . "\n";
