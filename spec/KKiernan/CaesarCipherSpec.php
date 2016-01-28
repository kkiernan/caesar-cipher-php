<?php

namespace spec\KKiernan;

use KKiernan\Analyzer;
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

    function it_gets_the_frequency_analysis_for_an_encrypted_message()
    {
        $this->frequencyAnalysis('e e e a')->shouldReturn(['a' => 0.25, 'e' => 0.75]);

        $this->frequencyAnalysis('Encrypted text is sometimes achieved by replacing one letter by another. To start deciphering the encryption it is useful to get a frequency count of all the letters.')
             ->shouldReturn([
                'a' => 0.04,
                'b' => 0.01,
                'c' => 0.05,
                'd' => 0.02,
                'e' => 0.01,
                'f' => 0.02,
                'g' => 0.02,
                'h' => 0.03,
                'i' => 0.06,
                'l' => 0.04,
                'm' => 0.01,
                'n' => 0.06,
                'o' => 0.05,
                'p' => 0.02,
                'q' => 0.00,
                'r' => 0.06,
                's' => 0.05,
                't' => 0.01,
                'u' => 0.02,
                'v' => 0.00,
                'x' => 0.00,
                'y' => 0.03,
             ]);
    }
}
