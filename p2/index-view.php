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
    <main>
        <div>
            <form method='POST' action='process.php'>
                <h1>Project 2 – What City?</h1>
                <h2>Instructions</h2>
                <ol>
                    <li>Guess the name of this city based on the image and supplied clue.</li>
                    <li>Make a selection from the suggested dropdown menu of city names.</li>
                    <li>Use the "Check Answer" button to activate your choice</li>
                    <li>A correct answer provides another city image. You may play again.</li>
                    <li>Keep guessing if your answer is incorrect, or refresh for another city.</li>
                </ol>
                <h3>Mystery city:</h3>
                <img class="image" src="http://e2p2.metrognome.me/random/image_<?php
                                                                                echo $cities[$city][0]; ?>.jpg"
                    alt="[ City Image ]" height="216" width="324" />
                <!-- image source is requires hard coding with http for it to appear in chrome browser, 
            and for the logic to work.
            firefox browser only works with http rather than http for logic to work accurately  -->
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
                <p class='correct'> ✔ Correct! Guess this one!</p>
                <?php } else { ?>
                <p class='incorrect'> ✘ Incorrect city, try again.</p>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>