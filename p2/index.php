<?php
session_start();

# Array of cities and clues to choose from

// var_dump($cities[$city][0]); # image or string of image name

// var_dump($city); # string name of city also the answer to create select options

// var_dump($clue); # $cities[$city][1] clue only
$cities = [
    // 'cityName' => [
    'Seoul' => [
        '1_seoul',
        '1 Seoul – South Korea'
    ],
    'Geneva' => [
        '2_geneva',
        '2 Geneva The Super Proton Synchrotron'
    ],
    'Dunedin' => [
        '3_dunedin',
        '3 Dunedin steepest street'
    ],
    'Reykjavik' => [
        '4_reykjavik',
        '4 Reykjavik Iceland'
    ],
    'Jericho' => [
        '5_jericho',
        '5 Jericho Palestine'
    ],
    'Toyko' => [
        '6_toyko',
        '6 Toyko largest metropolitan population'
    ],
    'Mexico City' => [
        '7_mexicoCity',
        '7 Mexico City capital of the Aztec Empire'
    ],
    'Chicago' => [
        '8_chicago',
        '8 Chicago first skyscraper.'
    ],
    'Kuwait City9' => [
        '_kuwaitCity',
        '9 Kuwait City Kuwait'
    ],
    'Rome' => [
        '10_rome',
        '10 Rome Cats have protected status in this Italian city'
    ]
];

# Default values – assumes a refreshed session
$useNewCity = true;
// $cityName = array($cities['cityName']);
$lastCity = '';

# If there is input received from user, results will show
if (isset($_SESSION['results'])) {

    # Extract data from the session
    $results = $_SESSION['results'];
    $haveAnswer = $results['haveAnswer'];
    $correct = $results['correct'];
    $lastCity = $_SESSION['city'];

    # If answered correctly, a new city image will show
    $useNewCity = $correct;

    #Clear the results. If the user refreshes/returns, old results are not shown
    $_SESSION['results'] = null;
}

# Set the city
if ($useNewCity) {
    # Prevent using same city image that was used last
    while (!isset($city) or $city == $lastCity) {
        // $city = array_rand($cities);
        $city = array_rand($cities);
    }
} else {
    $city = $lastCity;
}
var_dump($city);

# Update/set the city in the session to check user answer in process.php
$_SESSION['city'] = $city;
// $_SESSION['city'] = $cities[$city];

# Extract a clue and shuffle the city images for displaying in index-view.php
$clue = $cities[$city][1];
$cityName = $cities[$city][0];

// var_dump($cities[$city][0]); # string name of city
// var_dump($city); # image or string of image name
// var_dump($clue); # $cities[$city][1] clue only


// $imagesShuffled = str_shuffle($city);
// $imagesShuffled = shuffle($cities);
// $city = rand(1, 8);
# Load the display
require 'index-view.php';