<?php

# p1 parts
/*************************************************/
// split into even or odd numbers 
// https://stackoverflow.com/questions/12405264/split-array-into-two-arrays-by-index-even-or-odd

$odd = array();
$even = array();
foreach ($array as $k => $v) {
    if ($k % 2 == 0) {
        $even[] = $v;
    } else {
        $odd[] = $v;
    }
}


// or
$odd = array();
$even = array();
$both = array(&$even, &$odd);
array_walk($array, function ($v, $k) use ($both) {
    $both[$k % 2][] = $v;
});
// or use similar conditional from summer's javascript logic

/********************************************************/
// assign unique position array elements to odd numbers
$spots = array($begin, $magic, $bonus1, $curse, $mystic, $wild, $bonus2, $beware, $goal);
$board = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26); # prevent error beyond end of array
// multi-dimensional associative array key value pairs for unique spots
/* NOTE: find correct syntax for error free multiplication and division */
$spot_values = [
    'begin' => [
        'count' => 1,
        'value' => 1
    ],
    'magic' => [
        'count' => 5,
        'value' => 10
    ],
    'bonus1' => [
        'count'  => 7,
        'value' => +3 < 12
    ],
    'curse' => [
        'count'  => 9,
        'value' => -2
    ],
    'mystic' => [
        'count'  => 13,
        'value' => -1 < 13 or +1 > 13 or -5 > 7 or +5 < 19
    ],
    'wild' => [
        'count'  => 17,
        'value' => -2 > 10 or +2 < 20 or +1 or -1
    ],
    'bonus2' => [
        'count'  => 19,
        'value' => +2
    ],
    'beware' => [
        'count'  => 21,
        'value' => -10
    ],
    'goal' => [
        'count'  => 25,
        'value' => +1
    ]
];