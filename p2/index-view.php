<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 2 – What City?</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
                    <li>Guess the name of this city based on the image and supplied clue by selecting from the
                        dropdown&nbsp;menu. </li>
                    <li>Use the "Check Answer" button to activate your&nbsp;choice.</li>
                    <li>A correct answer provides another city to play&nbsp;again.</li>
                    <li>Keep guessing if your answer is incorrect, or refresh for another&nbsp;city.</li>
                </ol>
                <h3>Mystery city:</h3>
                <img class="image" src="/random/image_<?php echo $cities[$city][0]; ?>.jpg" alt="[ City Image ]"
                    height="216" width="324" />
                <p>Clue: <span class='clue'><?php echo $clue ?></span></p>

                <label for='answer'>Guess what city this is</label>
                <select id='answer' name='answer'>
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
                <p class='correct'> ✔ Correct! Guess this city!</p>
                <?php } else { ?>
                <p class='incorrect'> ✘ Incorrect city, try again.</p>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>