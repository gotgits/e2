<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <title>Index-1 – Project 1 – 5x5 game simulation</title>
    <link href="data" . rel=icon>
</head>

<body class="background">
    <main>
        <!-- display - index-test -->
        <?php
        echo "<link rel='stylesheet' type='text/css' href='game_style.css' />"
        ?>

        <h1>Index-1 – Project 1 - 5x5 Game Simulation</h1>
        <h2>Mechanics</h2>
        <ol>
            <li>Each player begins at 0 with 25 total spots on the board</li>
            <li>For each turn a random number of spots moved</li>
            <li>The last number spot is captured and previous numbers removed
            <li>Positive numbers only until completion unless a unique spot updates the condition</li>
            <li>Unique spots on the board produce additional conditions, some of which may be negative</li>
            <li>The player that reaches or passes spot 25 first is the winner</li>
        </ol>

        <h2>Results</h2>
        <ul>
            <li class="playerA">Player A moves <?php echo $totalA ?> spaces</li>
            <li class="playerB">Player B moves <?php echo $totalB ?> spaces</li>
            <li class="winner">Round Winner – <?php echo $roundWinner ?></li>
        </ul>
        <br>
        <?php foreach ($results as $turn => $details) { ?>
        <ul>
            <li> Turn # <?php echo $turn + 1 ?>
            <li>Number of turns taken by Player A: <?php echo $details['playerAturn'] ?></li>
            <li>Number of turns taken by Player B: <?php echo $details['playerBturn'] ?></li>
            <li>You are a Winner: <?php echo $details['winner'] ?> because you reached the finish first!</li>
        </ul>
        <?php } ?>
        <br>
        <p>Concept visual diagramming the unique spot positions that will effect play</p>
        <img alt='5x5' src='5x5odd.png' style='width:400px;'>
    </main>
</body>

</html>