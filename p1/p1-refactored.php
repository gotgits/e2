<?php

# Iterate for selection of random number for each player for each round of play
for ($i = 0; $i < $turn = rand(1, 49); $i++) {
    // move Player A
    $playerATurn = $turn;
    $totalAValue = $turn;
    $totalAValue = $playerATurn;
}
for ($j = 0; $j < $turn = rand(1, 49); $j++) {
    # move Player B
    $playerBTurn = $turn;
    $totalBValue = $playerBTurn;
}

if ($totalAValue > $totalBValue) {
    $roundWinner = 'Player A ahead';
} elseif ($totalAValue < $totalBValue) {
    $roundWinner = 'Player B ahead';
} else {
    $roundWinner = 'Tie';
}

# Accumulate total moves by each player
$playerATotal = 0;
$playerATurnCount = 0;
while ($playerATotal < 49) {
    $playerATotal = $playerATotal + rand(1, 49);
    $playerATurnCount++;
}

$playerBTotal = 0;
$playerBTurnCount = 0;
while ($playerBTotal < 49) {
    $playerBTotal = $playerBTotal + rand(1, 49);
    $playerBTurnCount++;
}

# Compare player total moves to decide winner
if ($playerATurnCount < $playerBTurnCount) {
    $winner = $playerATurnCount . ' total moves by Player A';
} else {
    $winner = $playerBTurnCount . ' total moves by Player B';
}

# Display results
$results[] = [
    'roundWinner' => $roundWinner,
    'playerATurnCount' => $playerATurnCount,
    'playerBTurnCount' => $playerBTurnCount,
    'winner' => $winner,
];
require 'p1-refactored-view.php';

/*
I did try ternary operator and simplifying if statements but incurred errors repeatedly. So instead I spent time on trying to sum and show rounds. I discovered that the current logic is not summing the value of the turns only playing until it reaches a number that meets the finish requirement.
*/