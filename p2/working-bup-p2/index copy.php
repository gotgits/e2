<?php
session_start();

# Array of cities and clues to choose from
// $random;

$cities = [
    '1' => '01 Seoul South Korea',
    '2' => '02 Geneva The Super Proton Synchrotron (SPS) is the second-largest machine in the CERN accelerator complex in Switzerland',
    '3' => '03 Dunedin New Zealand home of steepest residential street in the world at 19°',
    '4' => '04 Reykjavik Iceland',
    '5' => '05 Jericho Palestine',
    '6' => '06 Tokyo The largest metropolitan population Japan',
    '7' => '07 Mexico City Was once the capital of the Aztec Empire, known as Tenochtitlan',
    '8' => '08 Chicago The Home Insurance Building, built in 1884, is the first skyscraper in the world.',
    '9' => '09 Kuwait City Kuwait',
    // '10' => '010 Rome Cats have protected status in this Italian city.'
];

# Default values – assumes a refreshed session
$useNewImage = true;
$lastCity = '';

# If there is input received from user, results will show
if (isset($_SESSION['results'])) {

    # Extract data from the session
    $results = $_SESSION['results'];
    $haveAnswer = $results['haveAnswer'];
    $correct = $results['correct'];
    $lastCity = $_SESSION['city'];

    # If answered correctly, a new city image will show
    $useNewImage = $correct;

    #Clear the results. If the user refreshes/returns, old results are not shown
    $_SESSION['results'] = null;
}

# Set the city
if ($useNewImage) {
    # Prevent using same city image that was used last
    while (!isset($city) or $city == $lastCity) {
        $city = array_rand($cities);
    }
} else {
    $city = $lastCity;
}

# Update/set the city in the session to check user answer in process.php
$_SESSION['city'] = $city;

# Extract a clue and shuffle the city images for displaying in index-view.php
$clue = $cities[$city];
$imagesShuffled = str_shuffle($city);

# Load the display
require 'index-view.php';