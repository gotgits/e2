<!DOCTYPE html>
<html lang='en'>
<!-- Do not include any logic in this file -->
<!-- Logic for display purposes only, for loop, conditionals, minimal use -->

<head>

    <title>Boolean and test</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>

</head>

<body>

    <?php
    $random_num = rand(-100, 100);
    $total = $random_num;

    if ($total <= 30 and $total > 50) {
        // var_dump($total);
        var_dump(is_int($total));
    }

    ?>

</body>

</html>