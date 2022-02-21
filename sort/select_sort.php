<?php 
function selection_sort($numbers) {
    $len_numbers = count($numbers);
    for($i = 0; $i < $len_numbers; $i++) {
        $min_idex = $i;
        for($j = $i+1;$j < $len_numbers;$j++) {
            if($numbers[$min_idex] > $numbers[$j]) {
                $min_idex = $j;
            }
        }
        list($numbers[$i], $numbers[$min_idex]) = array($numbers[$min_idex], $numbers[$i]);

    }
    return $numbers;
}

$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(selection_sort($array));


?>