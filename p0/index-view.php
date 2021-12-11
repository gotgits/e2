<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Summed up</title>
    <link href='index.css' rel='stylesheet'>
</head>

<body>
    <main>
        <h2>All Summed Up</h2>
        <h3>Results</h3>
        <?php foreach ($results as $turns => $details) { ?>
        <dl>
            <dt>Turn # <?php echo $turns + 1 ?></dt>
            <dd class="rounds">Player gets:
                <?php echo $details['playerTurn'] . " &rarr; Board position " . $details['playerSum'] ?>
                </li>
            <dd class="rounds">Opponent gets:
                <?php echo $details['opponentTurn'] . " &rarr; Board position " . $details['opponentSum'] ?>
                </li>
                <?php } ?>
        </dl>

        <div class="results">Goal reached.<br>Player's final position on board <?= $playerSum ?><br> Opponent's final
            position on board <?= $opponentSum ?>
            <p class="winner">The Winner is <em><?= $winner ?></em></p>
        </div>

    </main>
</body>

</html>