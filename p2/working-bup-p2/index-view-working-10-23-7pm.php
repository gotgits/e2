<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 2 – What City?</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="data" . rel=icon>
    <link rel="stylesheet" href="index.css">
</head>

<body class="background">
    <form method='POST' action='process.php'>
        <h1>Project 2</h1>
        <h2>What City?</h2>
        <h3>Instructions</h3>
        <ol>
            <li></li>
        </ol>
        <p>Mystery city:</p>
        <img src="http://e2p2.metrognome.me/random/image_<?php
                                                            echo $cities[$city][0]; ?>.jpg" alt="[ City Image ]"
            height="216" width="324" />
        <!-- </p> -->
        <p>Clue: <span class='clue'><?php echo $clue ?></span></p>

        <!-- <label for='answer'>Your guess:</label>
        <input type='text' name='answer' id='answer'> -->
        <label for='answer'>Guess what city this is</label>
        <select name='answer' id='answer'>
            <option>Seoul</option>
            <option>Geneva</option>
            <option>Dunedin</option>
            <option>Reykjavik</option>
            <option>Jericho</option>
            <option>Toyko</option>
            <option>Mexico City</option>
            <option>Chicago</option>
            <option>Kuwait City</option>
            <option>Rome</option>
        </select>
        <button type='submit'>Check answer</button>
    </form>
    <?php if (isset($results)) { ?>
    <div class='results'>
        <?php if ($haveAnswer == false) { ?>
        Please select an answer.
        <?php } elseif ($correct) { ?>
        <div class='correct'> ✔ Correct! Guess this one!</div>
        <?php } else { ?>
        <div class='incorrect'> ✘ Incorrect city, try again.</div>
        <?php } ?>
    </div>
    <?php } ?>
</body>

</html>