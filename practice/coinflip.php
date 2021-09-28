<?php
$coin = ['heads', 'tails'];

# Player's choice
$randomNumber = rand(0, 1);
$player1Choice = $coin[$randomNumber];

# Coin flip
$randomNumber = rand(0, 1);
$flip = $coin[$randomNumber];

# create a boolean expression for the if arguments
//var_dump(4 > 5); # False
//var_dump(6 > 5); # True
//var_dump(6 == 9); # False

if ($player1Choice == $flip) {
    //var_dump('Player 1 wins!');
} else {
    //var_dump('Player 1 lost :(');
}

// var_dump($player1Choice);

// rand($min, $max);

# Rock, Paper Scissors
$moves = ['rock', 'paper', 'scissors'];
// $strawLengths = [2, 2, 2, 2, 2, 1];
// $mixed = ['rock', 1, .04, true];
# development steps and testing
$random_number = rand(0, 2);
var_dump($random_number);
($random_number) ? print 'true' : print 'false';
echo $random_number ? 'true' : 'false';
print "move is ($random_number)";

$move = $move[$random_number];
var_dump($move);

// $player1_move = $moves[rand(0, 2)];
// $player2_move = $moves[rand(0, 2)];

// var_dump($player1_move);
// var_dump($player2_move);

// if ($player1_move == $player2_move) {
//     var_dump('Tie');
// } elseif ($player1_move == 'rock' and $player2_move == 'paper') {
//     var_dump('Player 2 wins');
// } elseif ($player1_move == 'rock' and $player2_move == 'scissors') {
//     var_dump('Player 1 wins');
}