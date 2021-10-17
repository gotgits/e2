<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 2 – Finish Line Game with User Input</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="data" . rel=icon>
</head>

<body class="background">
    <main>
        <?php
        echo "<link rel='stylesheet' type='text/css' href='game_style.css' />"
        ?>
        <h1>Project 2</h1>
        <div>
            <h2>Finish Line Interactive </h2>
            <h3>Mechanics</h3>
            <ol>
                <li>Each player gets a series of random numbers that represent spaces on a board</li>
                <li>Each players numbers are accumulated as if they were moving across the board</li>
                <li>The first player's total that adds up to 25 wins.
            </ol>
            <h3>Showing round 1 play</h3>
            <ul>
                <li class="playerA">Player A moves <?php echo $totalA ?> spaces</li>
                <li class="playerB">Player B moves <?php echo $totalB ?> spaces</li>
                <li class="winner">Round Winner – <?php echo $roundWinner ?></li>
            </ul>
            <br>
            <h3>Results</h3>

            <?php foreach ($results as $turn => $details) { ?>
            <ul>
                <li class="playerA">Number of turns taken by Player A: <?php echo $details['playerATurnCount'] ?></li>
                <li class="playerB">Number of turns taken by Player B: <?php echo $details['playerBTurnCount'] ?></li>
                <li class="winner">You reached the finish first, <?php echo $details['winner'] ?></li>
            </ul>
            <?php } ?>
        </div>

    </main>
</body>

</html>