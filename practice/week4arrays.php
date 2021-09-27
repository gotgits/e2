<?php

$moves = ['rock', 'paper', 'scissors']; # Array of strings

$strawLengths = [2, 2, 2, 2, 2. 1];

$mixed = ['rock', 1, .04, true];

// echo $moves[0]; # should see 'rock'
// echo $moves[1]; # paper
// echo $moves[2]; # scissors
// echo $moves[3]; # Notice: Undefined offset: 3  message in browser

var_dump($moves); #variable dump for variable moves for debugging
/* this is line that appears in browser:
    array(3) {[0]=>string(4) "rock"[1]=>string(5) "paper [2]=> string(8) "scissors"}
    # use view page source to see a better formatted version of code returned by var_dump() on the page;
*/
# built-in function rand($min, $max);
$randomNumber = rand($0, $2);
    // var_dump($randomNumber); # returns int(2), int(0), int(1) etc random on refresh

$move = $moves[$randomNumber];

var_dump($move); # returns string(8) "scissors" , string(4) "rock" ...etc)

# Associative arrays

        // $penny_value = .01;
        // $nickel_value = .05;
        // $dime_value = .10;
        // $quarter_value = .25;
        // $halfdollar_value = .50;

$coin_values = [
    'penny' => .01,
    'nickle' => .05,
    'dime' => .10,
    'quarter' => .25
];
        // $pennies = 100;
        // $nickels = 25;
        // $dimes = 100;
        // $quarters = 34;

$coin_counts = [
    'penny' => 100,
    'nickle' => 25,
    'dime' => 100,
    'quarter' => 34,
];

    // var_dump($coin_values['quarter']); # returns float(0.25) in the browser
asort($coin_counts); # alphabetical sort
    /* returns sort by value
       array(4) {
           ["quarters"]=>
           int(24)
           ["nickel"]=>
           int(25)
           ["penny"]=>
           int(100)
           ["dimes"]=>
           int(100)
       }
      */ 
arsort($coin_counts); # reverse alphabetical 
    /* returns reverse sort by value
        array(4) {
            ["penny"]=>
            int(100)
            ["dimes"]=>
            int(100)
            ["nickel"]=>
            int(25)
            ["quarters"]=>
            int(24)
        }
    */ 

ksort($coin_counts); # sorts alphabetically by key # krsort reverse alpha sort
    /*      
        array(4) {
            ["dimes"]=>
            int(100)
            ["nickel"]=>
            int(25)
            ["penny"]=>
            int(100)
            ["quarters"]=>
            int(24)
        }
   */ 

    /* var_dump($cards); returns 

        array(9) {
            [0]=>
            int(6)
            [1]=>
            int(1)
            [2]=>
            int(3)
            [3]=>
            int(4)
            [4]=>
            int(2)
            [5]=>
            int(8)
            [6]=>
            int(7)
            [7]=>
            int(5)
            [8]=>
            int(9)
        }
        
   */
  foreach ($coin_counts as $coin => $count) {
      var_dump($coin);
      var_dump($count);
  } 
    /* returns 
            string(5) "penny"
            int(100)
            string(6) "nickle"
            int(25)
            string(5) "dimes"
            int(100)
            string(8) "quarters"
            int(24)
    */
    $total = 0;
    foreach ($coin_counts as $coin => $count) {
        $total = $total +$count * $coin_values[$coin];
    }
    var_dump($total);

    $coins = [
        'penny' => [
            'count' => 100, 
            'value' => .01
    ],
        'nickel' => [
            'count' => 25, 
            'value' => .05
        ],
        'dime' => [
            'count' => 100, 
            'value' => .10
        ],
        'quarter' => [
            'count' = 34, 
            'value' => .25
        ],
        'halfDollar' => [
            'count' => 10, 
            'value' => .50
            ]    
    ];
    foreach($coins as $coin => $info) {
        $total = $total + ($info[0] * $info[1];     
    }
    
    var_dump($total);

$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14];
shuffle($cards); # shuffle($cards); # returns random 
$playerCards = array_splice($cards, 0, count($cards) / 2); # start, length
$computerCards = $cards;
// $playerDraw = $playerCards[count($playerCards) - 1];

var_dump($playerCards);
$playerDraw = array_pop($playerCards);

var_dump($playerDraw);

var_dump($cards);

var_dump($coin_counts);

# find date format codes https://www.php.net/manual/en/datetime.format.php
    # date() takes two parameters, only one argument is required - second parameter is an optional argument, with a default time() if not defined
    // date(string $format [, int$timestamp = time()]) : string
date('F j Y'); # format for first parameter/argument, no argument for second parameter
rand () : int # no parameters, can return very large numbers
rand (int $min , int $max) : int # when specify parameters, both arguments must be passed

asort ( array&$array [, int $sort_flags = SORT_REGULAR]) : bool
 # & passed by reference and will change the data
 # passed as a copy, like a new variable will not change data
$foo = 'Cat';
$newFoo = strtoupper($foo); $foo is being passed through as a copy

var_dump($foo); # Cat  
var_dump($newFoo); # CAT newFoo will update and display change as a copy


# temporary echo statement for testing purpose
// echo $quarter_value; 

# Define 4 more variables, which will each
# Add a variable for halfdollars
# represent how many of each coin is in the bank




echo "Hello from week4.php";

    // #BEFORE
    // var_dump($phrases);
    // /**
    //     array(5) {
    //     [0]=>
    //     string(4) "hola"
    //     [1]=>
    //     string(5) "adios"
    //     [2]=>
    //     string(11) "hasta luego"
    //     [3]=>
    //     string(9) "por favor"
    //     [4]=>
    //     string(7) "de nada"
    // }
    //  */

    // # YOUR CODE HERE

    // # AFTER
    // var_dump($phrases);
    // /**
    // array(5) {
    //     [0]=>
    //     string(4) "HOLA"
    //     [1]=>
    //     string(5) "ADIOS"
    //     [2]=>
    //     stromg(11) "HASTA LUEGO"
    //     [3]=>
    //     string(9) "POR FAVOR"
    //     [4]=>
    //     string(7) "DE NADA"
    // }
//  */