<?php
session_start();

# Array of cities and clues to choose from
// $random;

$cities = [

    'Seoul' => [
        'img' => 'image_00.jpg',
        'klu' => '00 Seoul – South Korea'
    ],
    'Geneva' => [
        'img' => 'image_01.jpg',
        'clue' => '01 Geneva The Super Proton Synchrotron (SPS) is the second-largest machine in the CERN accelerator complex in Switzerland'
    ],
    'Dunedin' => [
        'img' => 'image_02.jpg',
        'klu' => '02 Dunedin New Zealand home of steepest residential street in the world at 19 degrees'
    ],
    'Reykjavik' => [
        'img' => 'image_03.jpg',
        'klu' => '03 Reykjavik Iceland'
    ],
    'Jericho' => [
        'img' => 'image_04.jpg',
        'klu' => '04 Jericho Palestine'
    ],
    'Toyko' => [
        'img' => 'image_05.jpg',
        'klu' => '05 Toyko Japan is the largest metropolitan population'
    ],
    'Mexico City' => [
        'img' => 'image_06.jpg',
        'klu' => '06 Mexico City Was once the capital of the Aztec Empire, known as Tenochtitlan'
    ],
    'Chicago' => [
        'img' => 'image_07.jpg',
        'klu' => '07 Chicago The Home Insurance Building, built in 1884, is the first skyscraper in the world.'
    ],
    'Kuwait City' => [
        'img' => 'image_08.jpg',
        'klu' => '08 Kuwait City Kuwait'
    ]
    // 'rome' => [
    //     'img' => 'image_09.jpg',
    //     'klu' => '09 Rome Cats have protected status in this Italian city'
    // ]

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