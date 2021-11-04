<?php

namespace HES;

class Number
{
    public $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function getHalf()
    {
        return $this->num / 2;
    }

    public function isValid()
    {
        $this->test(); # instance invokes the method within the class
        return is_numeric($this->num); # string(10) "Testing..."bool(true) 
    }
    protected function test()
    {
        var_dump('Testing...'); # string(10)"Testing..."bool(true)
    }
}