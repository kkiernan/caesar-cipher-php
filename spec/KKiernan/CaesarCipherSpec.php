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
}
