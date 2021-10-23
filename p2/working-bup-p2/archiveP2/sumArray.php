<?php
# working somewhat, updated variable names for project 2 10/20 9:15pm



$score = [];
$player = [];
$computer = [];
$playerScore = 0;
$computerScore = 0;
$finish = [];


// for ($r = 0; $r < $finish; $r++) {
$player = array("a" => 1, "b" => rand(1, 3));
$player = array_sum($player);
// var_dump($player);
$playerScore = $player;
var_dump($playerScore);
// }
$computer = array("a" => 1, "b" => rand(1, 3));
$computer = array_sum($computer);
$computerScore = $computer;
var_dump($computerScore);

// array_sum($computer);
// var_dump($computer);

//     $score = $player || $computer;

//     if ($player || $computer >= 7) {
// $score++;
// var_dump($score);
// print_r($score);
// var_dump($computer);
// var_dump($player);
// var_dump($score);
// }


# Iterate for selection of random number for each player for each round of play
# Iterate for selection of random number for each player for each round of play
for ($i = 0; $i < $turn = rand(1, 49); $i++) {
    // move Player A
    $player = $turn;
    $playerValue = $turn;
    $playerValue = $player;
}
for ($j = 0; $j < $turn = rand(1, 49); $j++) {
    # move Player B
    $computer = $turn;
    $computerValue = $computer;
}

if ($playerValue > $computerValue) {
    $roundWinner = 'Player A ahead';
} elseif ($playerValue < $computerValue) {
    $roundWinner = 'Player B ahead';
} else {
    $roundWinner = 'Tie';
}

# Accumulate total moves by each player
$playerTotal = 0;
$playerCount = 0;
while ($playerTotal < 49) {
    $playerTotal = $playerTotal + rand(1, 49);
    $playerCount++;
}

$computerTotal = 0;
$computerCount = 0;
while ($computerTotal < 49) {
    $computerTotal = $computerTotal + rand(1, 49);
    $computerCount++;
}

# Compare player total moves to decide winner
if ($playerCount < $computerCount) {
    $winner = $playerCount . ' total moves by Player A';
} else {
    $winner = $computerCount . ' total moves by Player B';
}

# Display results
$results[] = [
    'roundWinner' => $roundWinner,
    'playerCount' => $playerCount,
    'computerCount' => $computerCount,
    'winner' => $winner,
];

require 'index-view.php';