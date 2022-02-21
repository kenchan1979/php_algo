<?php

function bubble_sort($numbers)
{
    $len_numbers = count($numbers);
    for ($i = 0; $i < $len_numbers; $i++) {
        for ($j = 0; $j < $len_numbers - 1 - $i; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                list($numbers[$j], $numbers[$j + 1]) = array($numbers[$j + 1], $numbers[$j]);
            }
        }
    }
    return $numbers;
}

$array = [];
for ($i = 0; $i < 1000; $i++) {
    $array[] = $i;
}
$array = array_rand($array, 10);
var_dump(bubble_sort($array));
