<?php
# controller 

$board = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25); #prevent error beyond end of array

// var_dump($board);
// $playerAturn = [];
// $playerBturn = [];
$key = null;
$mystic = array(
    'count' => 13,
    'value' => rand(+-1 < 13, +-1 > 13),
);
$start = $board[0];
$moveTo = 'player';
$move = $key < 26;
$turnToMove = null;
// $winner = null;
// $turn = ['winner', 'other'];
// $details = null;
// shuffle($board);
# when refactoring to include all the unique spot_values divide the board into even and odd positions
# variation 4 - for each with dynamic variables
// foreach ($board as $key => $move) {
//     if ($key % 2 == 0) {
//         $moveTo = 'oddSpot';
//     } else {
//         $moveTo = 'evenSpot';
//     }
//     $$moveTo[] = array_pop($board);
// }
// var_dump($oddSpot); # array (13))
// var_dump($evenSpot); # array (12)

# variation 5 while loop to take turns up until 25 
# array to string error
// while (count($board) > 0) {
//     if ($moveTo == 'player A') {
//         $playerAturn[] = array_pop($board);
//         $moveTo = 'player B';
//     } else {
//         $playerBturn[] = array_pop($board);
//         $moveTo = 'player';
//     }
// }

// # variation 3 - foreach popping turn before the loop
// # not producing desired results for sequential cumulative iteration
// foreach ($board as $key => $move) {
//     $spotToMove = array_pop($board);

//     if ($key % 2 == 0) {
//         $playerAturn[] = $turnToMove;
//     } else {
//         $playerBturn[] = $turnToMove;
//     }
// }
// var_dump($playerAturn);
// var_dump($playerBturn);


# variation 6 @ngal2021 for loop with foreach loop in -view with var$details in controller
# single for loop
// $boardCount = count($board);
// for ($i = 0; $i < $boardCount; $i++) {
//     $playerAturn[] = array_pop($board);
//     $playerBturn[] = array_pop($board);
//     $i++;
// }

# multiple rounds for loop dynamic array

//Play 10 rounds experiment
// $turn = rand(0, 25);
for ($i = 0; $i < $turn = rand(1, 25); $i++) {

    // Turn to move Player A
    $playerAturn = $turn;
    $totalA = $playerAturn;
}
// var_dump($totalA);
for ($j = 0; $j < $turn = rand(1, 25); $j++) {
    # move Player B
    $playerBturn = $turn;
    $totalB = $playerBturn;
}
// var_dump($totalB);

if ($totalA > $totalB) {
    $roundWinner = 'Player A is Ahead';
} elseif ($totalA < $totalB) {
    $roundWinner = 'Player B is Ahead';
} else
    $roundWinner = 'tie';

$numberRounds[] = $turn + $turn == 25;
$total = $numberRounds;
$winner = $turn == 25;
var_dump($roundWinner);
var_dump($numberRounds);
var_dump($winner);
$results[] = [
    'playerA' => $playerAturn,
    'playerB' => $playerBturn,
    // 'turn' => $turn,
    'totalA' => $totalA,
    'totalB' => $totalB,
    'roundWinner' => $roundWinner,
    'winner' => $winner,
];


// var_dump($playerAturn);
// var_dump($totalA);
// var_dump($totalB);
// var_dump($roundWinner);
// if ($totalB > $totalA {
//     $playerB = 'roundWinner'
// })

// if ($roundsPlayed > 500) {
//     var_dump('Rounds exceeded round limit, stop.');
//     die();
// }
// With this in place, I also threw in a bunch of debugging output in the while loop so I could study the results of each round:

//  # Debugging 
//     echo "Round: $roundsPlayed <br>";
//     echo "Player 1 card count: ".count($player1Hand)." <br>";
//     echo "Player 2 card count: ".count($player2Hand)." <br>";
//     echo "Player 1 card: $p1Card[2]<br>";
//     echo "Player 2 card: $p2Card[2]<br>";
//     echo "Winner: $roundWinner<br>";
// var_dump($winner);
// Decide winner with one random shuffle


// assign unique position array elements to odd numbers


// $spots = array($begin, $magic, $bonus1, $curse, $mystic, $wild, $bonus2, $beware, $goal);
// multi-dimensional associative array key value pairs for unique spots
/* NOTE: find correct syntax for error free multiplication and division */
// $spot_values = [
//     'begin' => [
//         'count' => 1,
//         'value' => 1
//     ],
//     'magic' => [
//         'count' => 5,
//         'value' => 10
//     ],
//     'bonus1' => [
//         'count' => 7,
//         'value' => +3 < 12
//     ], 'curse' => [
//         'count' => 9,
//         'value' => -2
//     ],
//     'mystic' => [
//         'count' => 13,
//         'value' => -1 < 13 or +1 > 13 or -5 > 7 or +5 < 19
//     ], 'wild' => [
//         'count' => 17,
//         'value' => -2 > 10 or +2 < 20 or +1 or -1
//     ], 'bonus2' => [
//         'count' => 19,
//         'value' => +2
//     ],
//     'beware' => [
//         'count' => 21,
//         'value' => -10
//     ],
//     'goal' => [
//         'count' => 25,
//         'value' => +1
//     ]
// ];

# Random number turn for loop to iterate to next turn until reach 25
// $playerA = $move[rand(0, 25)];
// $playerB;

// $turns;
// $winner;
// $playerA = 0;
// $playerB = 0;

# totalMoves = 0;

# Decide the winner
// if ($playerA == '$move[rand(0, 25)]') {
//     $winner = 'Player A';
// } else {
//     $winner = 'Player B';
// }

require 'index-test-view.php';