<!doctype html>
<html lang='en'>
<!-- e2/rps/index-view.php -->

<head>
    <title>Game Package Class -RPS</title>
    <meta charset='utf-8'>
</head>

<h1>Rock/Paper/Scissors</h1>
<form method='POST' action='process.php'>

    <label for='answer'>Choose one to play</label>
    <select id='answer' name='answer'>
        <option selected>Rock</option>
        <option>Paper</option>
        <option>Scissors</option>
    </select>
    <button type='submit'>Check answer</button>
</form>
<h2>Results</h2>
<?php if (isset($results)) { ?>
<ul>
    <li>Player <?php echo $playerMove ?></li>
    <li>Computer <?php echo $computerMove ?></li>
    <li>Winner <?php echo $winner ?>!</li>
</ul>
<?php } ?>

</html>