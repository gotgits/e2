<?php
// rps echo 'Rock Paper Scissors';


require __DIR__ . '/vendor/autoload.php';

use RPS\Game;
use App\Debug;
use App\MyGame;

session_start();

$game = new RPS\Game(true);

$game->play('rock');
$game2 = new RPS\Game(true);

// Debug::dump($game->play('scissors'));
// Debug::dump($game->play('paper'));
Debug::dump($game->getResults());

// $results = $game->getResults();
// return $results;
// var_dump($game->getResults());
// var_dump($results['outcome']);

// var_dump($game->getResults());

# Make sure we can start a new instance without warning about session being already started
if (isset($_SESSION['results'])) {

    # Extract data from the session
    $results = $_SESSION['results'];
    $haveAnswer = $results['haveAnswer'];
    $correct = $results['correct'];

    $answer = $correct;
    require 'index-view.php';
}