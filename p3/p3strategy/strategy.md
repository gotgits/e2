> *'Snakes and Ladders' with PHP*

+ $player is created with user input from <form> using GET or POST.  
	#question is this better suited as a class rather than a variable

+ $player and $computer each take a $turn rolling $dice generated series with random numbers rand(1-*) that represent spaces on a $board = (int)


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