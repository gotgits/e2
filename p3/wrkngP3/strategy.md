> *'Snakes and Ladders' with PHP*

+ $player is created with user input from <form> using GET or POST.  
	#question is this better suited as a class rather than a variable

+ $player and $competitor each take a $turn rolling $dice generated series with random numbers rand(1-*) that represent spaces on a $board = (int)
+ public function OnGoingTally 
<?php

namespace App;

class Tally
{
    # Properties
    public $player = [];
    public $competitor = [];
	public $playerturns = [];
	public $competitorturns =[]
	public $board = 25;
;
$roll = rand(1,5);
$round = $roll($player or $competitor);
$player->$roll = player($round);
$competitor->roll = competitor($round);
$playerTally = player($round)++;
$competitorTally = competitor($round)++

#getSum here with add while loop to repeat until $finish = $board
#getRounds foreach player and competitor with tally for each round
public function getById((int)$turn)
    { $lastTotal = $player + new $turn->
	foreach$turns + $lastTotal
        return $this->products[$id] ?? null;
    }
}

+ $position for each turn is held in session storage; 
$turns = $position with additional $dice rolls accumulated for each $turn; 

+ sum() and also held in session stored as $turns($player) and $turns($computer); 

+ Repeat i++ until either $player or $computer reaches the $board;

+ if $finish($player == $board);
else $finish($computer == $board);
return = $first;

$first = $winner;

+ $record each $round between the $player and $computer;

+ $StoreRounds in a database and display in a table;

  
+ Assign conditions to individual numbers $positions() as array[] to change the outcome positively or negatively from their current progress $turns($player) and turns($computer) toward the $finish.