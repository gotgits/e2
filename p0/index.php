 <?php
    // variables
    $playerSum = 0;
    $competitorSum = 0;
    $goal = 25;

    // add to array loop until $sum1 or $sum2 >= $goal
    $results = [];
    $rounds = [];

    while ($playerSum < 25 && $competitorSum < $goal) {
        // random dice, safing result into variables
        $playerTurn = random_int(1, 5);
        $competitorTurn = random_int(1, 5);
        // $sum1 is increased by $playerTurn
        $playerSum += $playerTurn;
        // checking round results for goal (winner Player)
        if ($playerSum >= $goal) {
            // echo $playerTurn . $playerSum;
        }
        // $competitorTurn is increased by $competitorTurn
        $competitorSum += $competitorTurn;
        // checking round results for goal(winner Competitor)
        if ($competitorSum >= $goal) {
            // echo $competitorTurn . $competitorSum;
        }

        if ($winner = $playerSum >= $goal or $competitorSum >= $goal) {
            if ($playerSum >= $goal) {
                $winner = 'Player';
            } else {
                $winner = 'Competitor';
            }
        }
        
        $round = count($rounds)+1;
        array_push(
            $results,
            array(
                    'rounds' => $rounds,
                    'playerTurn' => $playerTurn,
                    'playerSum' => $playerSum,
                    'competitorTurn' => $competitorTurn,
                    'competitorSum' => $competitorSum,
                    'winner' => $winner,
                    )
        );
    }
    require 'index-view.php';