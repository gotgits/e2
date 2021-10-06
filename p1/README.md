
  

#  Project 1

  

  

+ By: *Rose Mikan*

  

  

+  [http://e2p1.metrognome.me](http://e2p1.metrognome.me)

  

  

##  Game planning

  

###  Finish Line!

  

> Basic PHP game simulator inspired by board game 'Snakes and Ladders'*

  

+ Each player gets a series of random numbers that represent spaces on a board

  

+ Each players' numbers are accumulated as if they were moving across the board

  

+ The first player's total that adds up to 25 wins.

  

+ Forward thinking coding challenge is to assign conditions to individual numbers to change the outcome of the random numbers, extending play time.

  

**Coding strategies**

  

1. Player A and Player B take turns for random numbers with a for loop to iterate through.

2. Calculate total for each player's random numbers accumulated turns, with a while loop that completes at 25

3. Conditional statement to compare number of moves for each player, player that reaches 25 first wins.

4. Report the results of Player A's moves, Player B's moves, the total for each, and the winner to the page with message statement.

+ Print round one status for Player A, Player B and results for that round which player won, or tie.

+ Print total number of turns taken by each Player A and Player B.

+ Print "winner" comparing Player A Total Turns to Player B Total Turns, deciding who reached finish first.

  

**Some forward thinking code strategies for a more complex game**

+  *Assign unique variables to each of the unique position conditional statements for Bonus moves, etc. to include in an array with assigned values.*

```php

$spots  =  array($begin,  $magic,  $bonus1,  $curse,  $mystic,  $wild,  $bonus2,  $beware,  $goal);

```

  

+ A more complex score could be, winner gains 100 points and play x amount of rounds for high score. Or play best out of three.

  

##  Outside resources

  
  

 [css inclusion] https://www.quora.com/How-do-we-link-CSS-files-to-a-PHP-file

  

  

##  Notes for instructor

  

  

 [sketch 1 idea]  (e2p1.metrognome.me/sketch1idea_IMG-3446.jpg)

  

  

 [sketch 2 plan]  (e2p1.metrognome.me/sketch2plan_IMG-3447.jpg)

  

  

 [detail 5x5 Finish Line]  (e2p1.metrognome.me/5x5_forward-backward_game_ai-vector-visual.png)