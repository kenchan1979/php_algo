<?php  
function comb_sort($numbers) {
    $len_numbers = count($numbers);
    $gap = $len_numbers;
    $swapped = true;

    while($gap != 1 or $swapped) {
        $gap = strval($gap / 1.3);
        if($gap < 1) {
            $gap = 1;
        };

        $swapped = false;

        for($i = 0; $i < $len_numbers-$gap; $i++) {
            if($numbers[$i] > $numbers[$i+$gap]) {
                list($numbers[$i], $numbers[$i+$gap]) = array($numbers[$i+$gap], $numbers[$i]);
                $swapped = true;
            }
        }
    }
    return $numbers;
}
// $array1 = [2, 4, 6, 5, 3, 1];
$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(comb_sort($array));
// var_dump(comb_sort($array1));