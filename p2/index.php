<?php
# Iterate for selection of random number for each player for each round of play
for ($i = 0; $i < $turn = rand(1, 25); $i++) {
    // Turn to move Player A
    $playerAturn = $turn;
    $totalA = $turn;
    $totalA = $playerAturn;
}

for ($j = 0; $j < $turn = rand(1, 25); $j++) {
    # move Player B
    $playerBturn = $turn;
    $totalB = $playerBturn;
}

if ($totalA > $totalB) {
    $roundWinner = 'Player A is Ahead, Congratulations!';
} elseif ($totalA < $totalB) {
    $roundWinner = 'Player B is Ahead, Congratulations!';
} else
    $roundWinner = 'tie round, keep going.';

# Accumulate total moves by each player
$playerATotal = 0;
$playerATurnCount = 0;
while ($playerATotal < 25) {
    $playerATotal = $playerATotal + rand(1, 25);
    $playerATurnCount++;
}

$playerBTotal = 0;
$playerBTurnCount = 0;
while ($playerBTotal < 25) {
    $playerBTotal = $playerBTotal + rand(1, 25);
    $playerBTurnCount++;
}

# Compare player total moves to decide winner
if ($playerATurnCount < $playerBTurnCount) {
    $winner = 'Player A Wins';
} else $winner = 'Player B Wins!';

# Display results
$results[] = [
    'playerATurnCount' => $playerATurnCount,
    'playerBTurnCount' => $playerBTurnCount,
    'winner' => $winner,
];

require 'index-view.php';