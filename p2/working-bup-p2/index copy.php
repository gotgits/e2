<?php
session_start();

# Array of cities and clues to choose from

$cities = [
    // 'cityName' => [
    '1_seoul' => [
        'Seoul' => '1 Seoul – South Korea'
    ],
    '2_geneva' => [
        'Geneva' => '2 Geneva The Super Proton Synchrotron (SPS) is the second-largest machine in the CERN accelerator complex in Switzerland'
    ],
    '3_dunedin' => [
        'Dunedin' => '3 Dunedin New Zealand home of steepest residential street in the world at 19 degrees'
    ],
    '4_reykjavik' => [
        'Reykjavik' => '4 Reykjavik Iceland'
    ],
    '5_jericho' => [
        'Jericho' => '5 Jericho Palestine'
    ],
    '6_toyko' => [
        'Toyko' => '6 Toyko Japan is the largest metropolitan population'
    ],
    '7_mexicoCity' => [
        'Mexico City' => '7 Mexico City Was once the capital of the Aztec Empire, known as Tenochtitlan'
    ],
    '8_chicago' => [
        'Chicago' => '8 Chicago The Home Insurance Building, built in 1884, is the first skyscraper in the world.'
    ],
    '9_kuwaitCity' => [
        'Kuwait City' => '9 Kuwait City Kuwait'
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

# Extract a clue and shuffle the city images for displaying in index-view.php
$clue = $cities[$city];
echo implode(" ", $cities[$city]);
// var_dump($cities[$city][1]);

// var_dump($clue);
// $imagesShuffled = str_shuffle($city);
// $imagesShuffled = shuffle($cities);
// var_dump($cities);
// $city = rand(1, 8);
# Load the display
require 'index-view.php';
