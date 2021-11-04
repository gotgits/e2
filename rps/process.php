<?php
// rps echo 'Rock Paper Scissors';
# e2/rps/process.php
namespace RPS;

require __DIR__ . '/vendor/autoload.php';

use RPS\Game;
use App\Debug;
use App\MyGame;

session_start();

$answer = $_POST['answer'];

$haveAnswer = true;

if ($answer == '') {
    $haveAnswer = false;
} else {
    $correct = false;
}

$_SESSION['results'] = [
    'haveAnswer' => $haveAnswer,
    'correct' => $correct
];

$results = $game->getResults();
return $results;

header('Location: index.php');