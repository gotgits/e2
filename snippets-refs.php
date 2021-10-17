<?php
# nested if statements

if (($a == 1 || $a == 2) && ($b == 3 || $b == 4) && ($c == 5 || $c == 6)) {
    //do that something here.
}

# https://www.php.net/manual/en/control-structures.if.php techguy14 at gmail dot com


# ternary operator 
# (condition ? action_if_true: action_if_false;)

(x > y ? 'Passed the test' : 'Failed the test')

# https://www.php.net/manual/en/control-structures.if.php Donny Nyamweya


# https://www.php.net/manual/en/control-structures.for.php
# The size never changes, the loop is optimized by using an intermediate variable to store the size instead of repeatedly calling count():

<?php

$people = array(
    array('name' => 'Kalle', 'salt' => 856412),
    array('name' => 'Pierre', 'salt' => 215863)
);

for($i = 0, $size = count($people); $i < $size; ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
?>