<?php
session_start();
#10-23- 3pm producing results for each image, name, clue but not correct answer
# Array of cities and clues to choose from

$cities = [
    // 'cityName' => [
    '1_seoul' => [
        '1 Seoul – South Korea',
        'Seoul'
    ],
    '2_geneva' => [
        'Geneva',
        '2 Geneva The Super Proton Synchrotron'
    ],
    '3_dunedin' => [
        'Dunedin',
        '3 Dunedin steepest street'
    ],
    '4_reykjavik' => [
        'Reykjavik',
        '4 Reykjavik Iceland'
    ],
    '5_jericho' => [
        'Jericho',
        '5 Jericho Palestine'
    ],
    '6_toyko' => [
        'Toyko',
        '6 Toyko largest metropolitan population'
    ],
    '7_mexicoCity' => [
        'Mexico City',
        '7 Mexico City capital of the Aztec Empire'
    ],
    '8_chicago' => [
        'Chicago',
        '8 Chicago first skyscraper.'
    ],
    '9_kuwaitCity' => [
        'Kuwait City',
        '9 Kuwait City Kuwait'
    ]
    // '10_rome' => [
    // 	'city' => '10',
    // 	'clue' => '10 Rome Cats have protected status in this Italian city'
    // ]
    // ]
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

# Update/set the city in the session to check user answer in process.php
$_SESSION['city'] = $city;
// $_SESSION['city'] = $cities[$city];

# Extract a clue and shuffle the city images for displaying in index-view.php
$clue = $cities[$city][1];
$cityName = $cities[$city][0];
// var_dump($city); # image or string of image name
// var_dump($cities); # the entire array outputs
// var_dump($cities[$city]); # array of one individual city name and clue
// var_dump($cities[$city][0]); # string name of city
var_dump($clue); # $cities[$city][1] clue only
// $imagesShuffled = str_shuffle($city);
// $imagesShuffled = shuffle($cities);
// $city = rand(1, 8);
# Load the display
require 'index-view.php';