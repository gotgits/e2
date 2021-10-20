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
            <?php foreach ($results as $rounds => $details) { ?>
            <ul>
                <li>Round # <?php echo $rounds + 1 ?>
                <li class="playerA">Player A moves <?php echo $totalAValue ?></li>
                <li class="playerB">Player B moves <?php echo $totalBValue ?></li>
                <li class="winner">Round results: <?php echo $roundWinner ?></li>
                <li class="playerA">Total number of turns taken by Player A: <?php echo $details['playerATurnCount'] ?>
                </li>
                <li class="playerB">Total number of turns taken by Player B: <?php echo $details['playerBTurnCount'] ?>
                </li>
                <li class="winner">Winner! <?php echo $details['winner'] ?>, finishes first! </li>
            </ul>
            <?php } ?>
        </div>
    </main>
</body>

</html>