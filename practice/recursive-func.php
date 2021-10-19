<?php
// Defining recursive function
function printValues($arr)
{
    global $count;
    global $items;

    // Check input is an array
    if (!is_array($arr)) {
        die("ERROR: Input is not an array");
    }

    /*
    Loop through array, if value is itself an array recursively call the
    function else add the value found to the output items array,
    and increment counter by 1 for each value found
    */
    foreach ($arr as $a) {
        if (is_array($a)) {
            printValues($a);
        } else {
            $items[] = $a;
            $count++;
        }
    }
    $results[] = [
        'a' => $a,
        'total' => $count,
        'values' => $items,
    ];

    return array('total' => $count, 'values' => $items);
}

echo $results[$count];