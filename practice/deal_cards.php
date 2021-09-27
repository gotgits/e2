<?php

# Set up cards - use 10 so you have an even number of cards to distribute
$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($cards);

# Initialize empty arrays for playerCards and computerCards
$playerCards = [];
$computerCards = [];
#
# Your code to distribute the cards 
# in an alternating fashion 
# to playerCards and computerCards 
# combine foreach and if statement, playerCards then computerCards
#
$playerCards = array_splice($cards, 0, 5);
// var_dump($playerCards);
// echo ($playerCards);
// var_dump($cards);
$computerCards = $cards;
$playerDraw = array_pop($playerCards);



# Verify results
var_dump($playerCards); # Should yield 5 random cards
var_dump($computerCards); # Should yield 5 different random cards