<?php
for ($i = 0; $i < $turn = rand(1, 25); $i++) {
    // Turn to move Player A
    $playerAturn = $turn;
    $totalA = $playerAturn;
    // $i++;
}

for ($j = 0; $j < $turn = rand(1, 25); $j++) {
    # move Player B
    $playerBturn = $turn;
    $totalB = $playerBturn;
    // $j++;
}


if ($totalA > $totalB) {
    $roundWinner = 'Player A is Ahead, Congratulations!';
} elseif ($totalA < $totalB) {
    $roundWinner = 'Player B is Ahead, Congratulations!';
} else
    $roundWinner = 'tie round, keep going.';

$totalAsum[] = $totalA * $turn;
$totalBsum[] = $totalB * $turn;
if ($totalAsum == 25 or $totalAsum > 25) {
    $playerAturn = 'Player A Wins!';
} elseif ($totalBsum == 25 or $totalBsum > 25) {
    $playerBturn = 'Player B Wins!';
}

$numberRounds = [];
$total = $numberRounds;
$winner = $total >= 25;

$results[] = [
    'totalAsum' => $totalAsum,
    'totalBsum' => $totalBsum,
    'playerAturn' => $playerAturn,
    'playerBturn' => $playerBturn,
    'turn' => $turn,
    'totalA' => $totalA,
    'totalB' => $totalB,
    'roundWinner' => $roundWinner,
    'winner' => $winner,
];

require 'index-1-view.php';