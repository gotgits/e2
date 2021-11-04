<?php

session_start();

$cities = [
    'Seoul' => [
        '1_seoul',
        'A global hub for tech and innovation, and is reported to have the fastest average internet speed in the world.'
    ],
    'Geneva' => [
        '2_geneva',
        'The Super Proton Synchrotron (SPS) is the second-largest machine in the CERN accelerator complex.'
    ],
    'Dunedin' => [
        '3_dunedin',
        'Home of steepest residential street in the world at 19 degrees'
    ],
    'Reykjavik' => [
        '4_reykjavik',
        'Safe enough that babies can sit alone in the open to let them enjoy the fresh air and sunlight while parents shop.'
    ],
    'Jericho' => [
        '5_jericho',
        'Sitting at 258 meters (846 feet) below sea level, this is the lowest city in the world.'
    ],
    'Toyko' => [
        '6_toyko',
        'Once a small fishing village named Edo, this capital city is the most populous city in the world today (by the metropolitan area).'
    ],
    'Mexico City' => [
        '7_mexicoCity',
        'Was once the capital of the Aztec Empire, known as Tenochtitlan.'
    ],
    'Chicago' => [
        '8_chicago',
        'The Home Insurance Building, built in 1884, was the first skyscraper in the world, it stood only 42 meters tall, with 10 floors.'
    ],
    'Kuwait City' => [
        '9_kuwaitCity',
        'Most of its water resource comes from groundwater as it has no permanent rivers or lakes, relying on an inflow of lateral underflow from its nearest neighbor.'
    ],
    'Rome' => [
        'a10_rome',
        'Starting in 1991, cats have protected status, anywhere with at least 5 cats is a natural urban habitat.'
    ]
];

# Default values – assumes a refreshed session
$useNewCity = true;

$lastCity = '';

# If there is input received from user, results will show
if (isset($_SESSION['results'])) {

    # Extract data from the session
    $results = $_SESSION['results'];
    $haveAnswer = $results['haveAnswer'];
    $correct = $results['correct'];
    $lastCity = $_SESSION['city'];

    $useNewCity = $correct;

    #Clear the results. 
    $_SESSION['results'] = null;
}

# Set the city
if ($useNewCity) {
    # Prevent using same city image that was used last
    while (!isset($city) or $city == $lastCity) {
        $city = array_rand($cities);
    }
} else {
    $city = $lastCity;
}

# Update/set the city in the session to check user answer in process.php
$_SESSION['city'] = $city;

# Extract a clue and city image from array for displaying in index-view.php
$clue = $cities[$city][1];
# Load the display
require 'index-view.php';