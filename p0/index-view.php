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
        <?php foreach ($results as $rounds => $details) { ?>
        <dl>
            <dt>Round # <?php echo $rounds +1 ?></li>
            <dd class="rounds">Player gets:
                <?php echo $details['playerTurn']." &rarr; Board position ".$details['playerSum'] ?>
                </li>
            <dd class="rounds">Competitor gets:
                <?php echo $details['competitorTurn']. " &rarr; Board position ".$details['competitorSum'] ?>
                </li>
                <?php } ?>
        </dl>

        <div class="results">Goal reached.<br>Player's final position on board <?=$playerSum?><br> Competitor's final
            position on board <?=$competitorSum?>
            <p class="winner">The Winner is <em><?=$winner?></em></p>
        </div>

    </main>
</body>

</html>