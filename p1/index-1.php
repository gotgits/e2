<?php
# controller 

$board = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25); #prevent error beyond end of array

// var_dump($board);
// $playerAturn = [];
// $playerBturn = [];
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
    $roundWinner = 'Player A is Ahead, Congratulations!';
} elseif ($totalA < $totalB) {
    $roundWinner = 'Player B is Ahead, Congratulations!';
} else
    $roundWinner = 'tie round, keep going.';

$numberRounds[] = $turn + $turn == 25;
$total = $numberRounds;
$winner = $turn == 25;
var_dump($roundWinner);
var_dump($numberRounds);
var_dump($winner);
$results[] = [
    'playerAturn' => $playerAturn,
    'playerBturn' => $playerBturn,
    'turn' => $turn,
    'totalA' => $totalA,
    'totalB' => $totalB,
    'roundWinner' => $roundWinner,
    'winner' => $winner,
];

require 'index-1-view.php';