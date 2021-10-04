<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <title>Project 1 – 5x5 game simulation</title>
    <link href="data" . rel=icon>
</head>

<body>
    <?php
    //include CSS Style Sheet
    echo "<link rel='stylesheet' type='text/css' href='game_style.css' />"; ?>
    <h1>Project 1 - 5x5 Game Simulation</h1>
    <h2>Mechanics</h2>
    <ul>
        <li class="playerA">Player A moves <?php echo $playerA ?>times to reach the end</li>
        <li class="playerB">Player B moves <?php echo $playerB ?>times to reach the end </li>
        <li class="winner">The winner is <?php echo $winner ?></li>
    </ul>
    <h2>Results</h2>
    <ul>
        <li class="playerA"><a href=" "></li>
        <li class="playerB"><a href=" "></li>
        <li class="winner"><a href=" "></li>
        <li class="total"><a href=" "></li>
    </ul>
</body>

</html>