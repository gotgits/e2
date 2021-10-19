<?php
# Unsuccessful rounds with for loop, or do while loop, or while loop
// $turnsValue = "";
// for ($r = 0; $r < $turnsValue; $r++) {
# Iterate for selection of random number for each player for each round of play
for ($i = 0; $i < $turn = rand(1, 49); $i++) {
    // Turn to move Player A
    $playerATurn = $turn;
    $totalA = $turn;
    $totalA = $playerATurn;

    // var_dump($totalA);
    var_dump($playerATurn);
    echo "<br>";
    echo "<br>";
}
for ($j = 0; $j < $turn = rand(1, 49); $j++) {
    # move Player B
    $playerBTurn = $turn;
    $totalB = $playerBTurn;

    // var_dump($totalB);
    var_dump($playerBTurn);
    echo "<br>";
}

if ($totalA > $totalB) {
    $roundWinner = 'Player A ahead';
} elseif ($totalA < $totalB) {
    $roundWinner = 'Player B ahead';
} else {
    $roundWinner = 'Tie';
}
$rounds = " ";

$turnsValue = $totalA < 49 || $totalB < 49;

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
// }

# Compare player total moves to decide winner
if ($playerATurnCount < $playerBTurnCount) {
    $winner = $playerATurnCount . ' total moves by Player A';
} else {
    $winner = $playerBTurnCount . ' total moves by Player B';
}

# Display results
$results[] = [
    'roundWinner' => $roundWinner,
    // 'round' => $round,
    'playerATurnCount' => $playerATurnCount,
    'playerBTurnCount' => $playerBTurnCount,
    'winner' => $winner,
];
// }
require 'p1-refactored-view.php';