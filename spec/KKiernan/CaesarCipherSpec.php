<?php

namespace spec\KKiernan;

use PhpSpec\ObjectBehavior;

class CaesarCipherSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\CaesarCipher');
    }

    public function it_encrypts_messages()
    {
        $this->encrypt('abc', 1)->shouldReturn('bcd');

        $this->encrypt('ABC', 1)->shouldReturn('BCD');

        $this->encrypt('the quick fox jumps over the lazy dog', 7)
             ->shouldReturn('aol xbpjr mve qbtwz vcly aol shgf kvn');
    }

    public function it_decrypts_messages()
    {
        $this->decrypt('aol xbpjr mve qbtwz vcly aol shgf kvn', 7)
             ->shouldReturn('the quick fox jumps over the lazy dog');
    }

    public function it_handles_keys_larger_than_25_correctly()
    {
        $this->encrypt('abc', 26)->shouldReturn('bcd');
        $this->encrypt('abc', 52)->shouldReturn('cde');
        $this->encrypt('abc', 101)->shouldReturn('bcd');
    }

    public function it_encrypts_a_message_with_uppercase_letters()
    {
        $this->encrypt('This is a Message', 6)
             ->shouldReturn('Znoy oy g Skyygmk');
    }

    public function it_attempts_to_brute_force_the_correct_key()
    {
        $plaintext = 'The days are getting short again.
            Leaves fall from the trees.
            Nights are haunted by howling winds.
            Harbingers of the freeze.';

        $ciphertext = 'Max wtrl tkx zxmmbgz lahkm tztbg.
            Extoxl ytee ykhf max mkxxl.
            Gbzaml tkx atngmxw ur ahpebgz pbgwl.
            Atkubgzxkl hy max ykxxsx.';

        $this->crack($ciphertext)->shouldReturn(19);

        $this->decrypt($ciphertext, 19)->shouldReturn($plaintext);
    }
}
