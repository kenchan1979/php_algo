<?php 

function cocktail_sort($numbers) {
    $len_numbers = count($numbers);
    $swapped = true;
    $start = 0;
    $end = $len_numbers - 1;
    while($swapped) {
        $swapped = false;
        for($i = $start; $i < $end; $i++) {
            if ($numbers[$i] > $numbers[$i+1]) {
                list($numbers[$i], $numbers[$i+1]) = array($numbers[$i+1], $numbers[$i]);
                $swapped = true;
            }
        }
        var_dump($numbers[$i]);


        if (!$swapped) {
            break;
        };

        $swapped = false;
        $end = $end - 1;

        for($i = $end - 1; $i < $start - 1; $i--) {
            if ($numbers[$i] > $numbers[$i+1]) {
                list($numbers[$i], $numbers[$i+1]) = array($numbers[$i+1], $numbers[$i]);
                $swapped = true;
            }
        }
        var_dump($numbers[$i]);

        $start++;

    return $numbers;

    }
}
$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i;
}
$array = array_rand($array, 10);
var_dump(cocktail_sort($array));

?>