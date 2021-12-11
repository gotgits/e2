<?php
// Defining variables
$playerSum = 0;
$opponentSum = 0;
$goal = 25;
$turn = [];

$results = [];
$turns = [];

$magic = 11;
$bonus = 6;
$curse = 0;
$mystic = 1;
$wild = 15;



while ($turn = $playerSum < $goal && $opponentSum < $goal) {
    # calculating each turn with conditional variables to effect the outcome
    $turnP = random_int(1, 10);
    if ($sumP = $turnP) {
        if ($turnP == 5) {
            $sumP = $magic;
        } elseif ($turnP == 4) {
            $sumP = $bonus;
        } elseif ($turnP == 9) {
            $sumP = $curse;
        } elseif ($turnP == 2) {
            $sumP = $mystic;
        } elseif ($turnP == 7) {
            $sumP = $wild;
        } else {
            $sumP = $turnP;
        }
    }

    $playerTurn = $sumP;
    $playerSum += $playerTurn;
    // checking round results for goal (winner Player)
    if ($playerSum >= $goal) {
        // echo $playerTurn." ".$playerSum;
    }
    // $opponentTurn is increased by $opponentTurn
    $turnC = random_int(1, 10);
    if ($sumC = $turnC) {
        if ($turnC == 5) {
            $sumC = $magic;
        } elseif ($turnC == 4) {
            $sumC = $bonus;
        } elseif ($turnC == 9) {
            $sumC = $curse;
        } elseif ($turnC == 2) {
            $sumC = $mystic;
        } elseif ($turnC == 7) {
            $sumC = $wild;
        } else {
            $sumC = $turnC;
        }
    }
    $opponentTurn = $sumC;
    $opponentSum += $opponentTurn;
    // checking round results for goal(winner Opponent)
    if ($opponentSum >= $goal) {
        // echo $opponentTurn." ".$competitorSum;
    }
    // Individual round results
    // echo "Player turn $playerTurn Player Round Sum: $playerSum <br>
    // Opponent turn $competitorTurn Opponent Round Sum: $opponentSum<br><br>";

    // Round results of both players
    // $round[]=$results;

    // }
    // When goal is met Winner
    if ($winner = $playerSum >= $goal or $opponentSum >= $goal) {
        if ($playerSum >= $goal) {
            $winner = 'Player';
        } else {
            $winner = 'Opponent';
        }
    }
    $turn = count($turns) + 1;
    array_push(
        $results,
        array(
            'turns' => $turns,
            'playerTurn' => $playerTurn,
            'playerSum' => $playerSum,
            'opponentTurn' => $opponentTurn,
            'opponentSum' => $opponentSum,
            'winner' => $winner,
        )
    );
}
require 'index-view.php';