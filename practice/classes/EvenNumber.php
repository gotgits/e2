<?php

namespace HES;

// class EvenNumber extends Number
// {
//     public function isValid()
//     {
//         return is_numeric($this->num) and $this->num % 2 == 0;
//     }
// }
/* the correct way to write the above logic when overwriting part of the parent class 
requires eliminating the $this->num in reference to the method 
because that would call an instance this class /the EvenNumber class 
not the Number class which is what our logic intends to do. 
If you don't correct this it creates an endless loop that will crash */

class EvenNumber extends Number
{
    public function isValid()
    {
        $this->test(); # instance ok not overwriting
        #alternate also okay
        // parent::test();
        return parent::isValid() and $this->num % 2 == 0;
    }
}