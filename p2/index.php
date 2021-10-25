<?php

session_start();

$cities = [
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
    'Kuwait City' => [
        '9_kuwaitCity',
        '9 Kuwait City Kuwait'
    ],
    'Rome' => [
        'a10_rome',
        'a10 Rome Cats have protected status in this Italian city'
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
        // $city = array_rand([$cities]); # hang up
        $city = array_rand($cities);
        # this only works accurately in firefox with http and not https
        # chrome produces consistent "incorrect answer" results even with http
    }
} else {
    $city = $lastCity;
}

# Update/set the city in the session to check user answer in process.php
$_SESSION['city'] = $city;

# Extract a clue and shuffle the city images for displaying in index-view.php
$clue = $cities[$city][1];
# Load the display
require 'index-view.php';