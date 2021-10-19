<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <title>Refactored Project 1 – Finish Line Game Simulation</title>
    <link href="data" . rel=icon>
    <link rel="stylesheet" href="game-style.css">
</head>

<body class="background">
    <main>
        <?php
        echo "<link rel='stylesheet' type='text/css' href='game_style.css' />"
        ?>

        <h1>Refactored Project 1 - Finish Line</h1>
        <h2>Mechanics</h2>
        <ol>
            <li>Each player gets a series of random numbers that represent spaces on a board</li>
            <li>Each players numbers are accumulated as if they were moving across the board</li>
            <li>The first player's total that adds up to 49 or more wins.
        </ol>
        <br>
        <h2>Results</h2>

        <?php foreach ($results as $rounds => $details) { ?>
        <ul>
            <li>Round # <?php echo $rounds + 1 ?>
            <li class="playerA">Player A moves <?php echo $totalAValue ?></li>
            <li class="playerB">Player B moves <?php echo $totalBValue ?></li>
            <li class="winner">Round results: <?php echo $roundWinner ?></li>
            <li class="playerA">Total number of turns taken by Player A: <?php echo $details['playerATurnCount'] ?></li>
            <li class="playerB">Total number of turns taken by Player B: <?php echo $details['playerBTurnCount'] ?></li>
            <li class="winner">Winner! <?php echo $details['winner'] ?>, finishing first! </li>
        </ul>
        <?php } ?>
    </main>
</body>

</html>