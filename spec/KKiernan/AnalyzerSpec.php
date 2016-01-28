<?php

namespace spec\KKiernan;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnalyzerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Analyzer');
    }

    function it_calculates_the_frequency_of_a_char_in_a_string_as_a_percentage()
    {
        $this->characterFrequency('e', 'a b c d e f g e')->shouldReturn(0.25);
    }

    function it_gets_characters_used_in_string()
    {
        $this->characters('hello world')->shouldReturn(['h', 'e', 'l', 'o', 'w', 'r', 'd']);

        $this->characters('hello-world (123) & @')->shouldReturn(['h', 'e', 'l', 'o', 'w', 'r', 'd']);
    }
}
