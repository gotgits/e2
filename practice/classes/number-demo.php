<?php

require 'Number.php'; #parent/superclass
require 'EvenNumber.php'; #child/subclass 
require 'Debug.php'; # static examples
# the child inherits with the extend keyword in the EvenNumber class the properties and methods from Number class or parent.
# can also work with the use keyword, and not need the namespace infront of each class
// use HES\Number;
// use HES\EvenNumber;
// use HES\Debug as DebugA;
// use ABC\Debug as DebugB;
# if there are collisions of names with different namespaces you can use an alias to reference the namespace with the as keyword to specify which namespace

// $example1 = new HES\Number(20);  # create an object instance from the class with a variable
// $example2 = new HES\EvenNumber(20);

// var_dump($example1->getHalf()); #10
// var_dump($example2->getHalf()); #10
// var_dump($example3->isValid()); # true
// var_dump($example4->isValid()); # true

# more examples

$example3 = new HES\Number(9);
$example4 = new HES\EvenNumber(9);

var_dump($example3->isValid()); # true
var_dump($example4->isValid()); # false
# string(10)"Testing..."bool(true)
# will also display  because protected allows subclass/child to invoke just like from within parent/superclass can invoke

# static examples
#use static when you have somewhat related methods without necessarily overlapping data that you would want to maintain within an object
// $debug = new Debug();
//$debug->dump('Hello World') # instance of, and then invoke NOT correct because static

# coding with use keyword and alias
// DebugA::dump('a', 'b', ['x', 'y', 'z']);

HES\Debug::dump('a', 'b', ['x', 'y', 'z']); # reduce to one line, reference the class and go directly to the method dump # outputs a nicely formatted multi-dimensional array on the page rather than the usual long string of a var_dump()
# using static eliminates the steps of creating an object of a class and then invoke it