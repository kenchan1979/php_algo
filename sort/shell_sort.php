<?php 
function shell_sort($numbers) {
    $len_numbers = count($numbers);
    $gap = intdiv( $len_numbers, 2);
    while($gap > 0) {
        for($i = $gap;$i < $len_numbers; $i++) {
            $temp = $numbers[$i];
            $j = $i;
            while($j >= $gap && $numbers[$j-$gap] > $temp) {
                $numbers[$j] = $numbers[$j-$gap];
                $j -= $gap;
            }
            $numbers[$j] = $temp;
        }
        $gap = intdiv($gap, 2);
    }
    return $numbers;
}

$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(shell_sort($array));

?>