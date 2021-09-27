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

# Rock, Paper Scissors
$moves = ['rock', 'paper', 'scissors'];
$player1Move = $moves[rand(0, 2)];
$player2Move = $moves[rand(0, 2)];

var_dump($player1Move);
var_dump($player2Move);

if($player1Move == $player2Move) {
    var_dump('Tie');
} elseif ($player1Move == 'rock' and $player2Move == 'paper') {
    var_dump(('Player 2 wins');    
} elseif($player1Move == 'rock' and $player2Move == 'scissors') {
    var_dump('Player1 wins');
}