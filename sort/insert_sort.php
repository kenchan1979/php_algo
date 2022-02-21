<?php 
function insert_sort($numbers) {
    $len_numbers = count($numbers);
        for($i = 1; $i < $len_numbers; $i++) {
            $temp = $numbers[$i];
            $j = $i - 1;
            while($j > 0 && $numbers[$j] > $temp) {
                $numbers[$j+1] = $numbers[$j];
                $j -= 1;
            }
        }
        return $numbers;
}
$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(insert_sort($array));
?>