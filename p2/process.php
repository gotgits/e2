<?php
session_start();

# User input/guess
$answer = $_POST['answer'];

# City choice to guess from
$city = $_SESSION['city'];

$haveAnswer = true;

if ($answer == '') {
    $haveAnswer = false;
} elseif ($answer == $city) {
    $correct = true;
} else {
    $correct = false;
}

# Store results in the session
$_SESSION['results'] = [
    'haveAnswer' => $haveAnswer,
    'correct' => $correct,
    'answer' => $answer,
];

/* Redirect user back to index page to view results of their answer
   with an option to guess again 
*/
header('Location: index.php');
