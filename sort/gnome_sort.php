<?php
function gnome_sort($numbers)
{
    $len_numbers = count($numbers);
    $index = 0;
    while ($index < $len_numbers) {
        if ($index == 0) {
            $index += 1;
        }
        if ($numbers[$index] >= $numbers[$index - 1]) {
            $index += 1;
        } else {
            list($numbers[$index], $numbers[$index - 1]) = array($numbers[$index - 1], $numbers[$index]);
            $index -= 1;
        }
    }
    return $numbers;
}

    $array = [];
    for ($i = 0; $i < 1000; $i++) {
        $array[] = $i;
    }
    $array = array_rand($array, 10);
    var_dump(gnome_sort($array));
?>
