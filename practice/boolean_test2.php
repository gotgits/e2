<!DOCTYPE html>
<html lang='en'>
<!-- Do not include any logic in this file -->
<!-- Logic for display purposes only, for loop, conditionals, minimal use -->

<head>

    <title>Boolean or test</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>

</head>

<body>

    <?php
    $random_num = rand(-100, 100);
    $total = $random_num;
    if ($total <= 30 or $total > 50) {
        var_dump($total);
    }

    ?>

</body>

</html>