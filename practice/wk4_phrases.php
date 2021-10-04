<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phrases</title>
</head>

<body>
    <?php
    $phrases = array(
        'hello' => 'hola',
        'goodbye' => 'adios',
        'see you later' => 'hasta luego',
        'please' => 'por favor',
        'thank you' => 'de nada',
    );
    foreach ($phrases as $eng => $spn) {
        echo "English phrase: " . $eng . " — " . " Spanish phrase: " . $spn;
        echo "<br>";
    };
    $phrases = array(
        array('hello', 'hola'),
        array('goodbye', 'adios'),
        array('see you later', 'hasta luego'),
        array('please', 'por favor'),
        array('thank you', 'de nada'),
    );

    // var_dump($phrases[2][0]);
    echo "Spanish: " . $phrases[2][1] . " English: " . $phrases[2][0] . ".<br>";

    ?>
</body>

</html>