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

    function it_should_substitute_b_for_a_with_key_of_1()
    {
        $this->shiftCharacter('a', 1)->shouldReturn('b');
    }

    function it_should_substitute_c_for_a_with_key_of_2()
    {
        $this->shiftCharacter('a', 2)->shouldReturn('c');
    }

    function it_should_substitute_a_for_z_with_key_of_1()
    {
        $this->shiftCharacter('z', 1)->shouldReturn('a');
    }

    function it_should_substitute_a_for_y_with_key_of_2()
    {
        $this->shiftCharacter('y', 2)->shouldReturn('a');
    }

    function it_encrypts_messages()
    {
        $this->encrypt('The quick fox jumps over the lazy dog', 7)
             ->shouldReturn('aol xbpjr mve qbtwz vcly aol shgf kvn');
    }

    function it_decrypts_messages()
    {
        $this->decrypt('aol xbpjr mve qbtwz vcly aol shgf kvn', 7)
             ->shouldReturn('the quick fox jumps over the lazy dog');
    }
}
