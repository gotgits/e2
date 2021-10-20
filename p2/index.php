<?php
$score = 0;
$playerScore = 0;
$computerScore = 0;
while ($score <= 7) {
    $player = [1];
    $player[] = array_sum($player) + rand(1, 6);
    $player++;
    // var_dump($player);
    // echo $player;
    // echo "<br><br>";
    $computer = [1];
    $computer[] = array_sum($computer) + rand(1, 6);
    $computer++;
    // var_dump($computer);
    // echo $computer;
    // echo "<br><br>";

    $score++;
    var_dump($computer);
    var_dump($player);
    var_dump($score);
}


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
    $winner = ' Player A';
} else {
    $winner = ' Player B';
}

# Display results
$results[] = [
    'roundWinner' => $roundWinner,
    'playerATurnCount' => $playerATurnCount,
    'playerBTurnCount' => $playerBTurnCount,
    'winner' => $winner,
];

require 'index-view.php';