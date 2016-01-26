<?php

namespace spec\KKiernan;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CaesarCipherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\CaesarCipher');
    }

    function it_encrypts_messages()
    {
        $this->encrypt('abc', 1)->shouldReturn('bcd');

        $this->encrypt('ABC', 1)->shouldReturn('BCD');

        $this->encrypt('the quick fox jumps over the lazy dog', 7)
             ->shouldReturn('aol xbpjr mve qbtwz vcly aol shgf kvn');
    }

    function it_decrypts_messages()
    {
        $this->decrypt('aol xbpjr mve qbtwz vcly aol shgf kvn', 7)
             ->shouldReturn('the quick fox jumps over the lazy dog');
    }

    function it_handles_keys_larger_than_25_correctly() {
        $this->encrypt('abc', 26)->shouldReturn('bcd');
        $this->encrypt('abc', 52)->shouldReturn('cde');
        $this->encrypt('abc', 101)->shouldReturn('bcd');
    }

    function it_encrypts_a_message_with_uppercase_letters() {
        $this->encrypt('This is a Message', 6)
             ->shouldReturn('Znoy oy g Skyygmk');
    }
}
