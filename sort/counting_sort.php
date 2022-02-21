<?php 
function counting_sort($numbers) {
    $max_num = max($numbers);

    $counts = [];
    for($i = 0; $i < $max_num + 1;$i++) {
        $counts[$i] = 0;
    }
    $result = [];
    for($i = 0; $i < count($numbers); $i++) {
        $result[$i] = 0;
    }
    foreach($numbers as $num) {
        $counts[$num] += 1; 
    }

    for($i = 1; $i < count($counts); $i++) {
        $counts[$i] += $counts[$i-1];
    }
    $i = count($numbers) - 1;
    while($i >= 0) {
        $index = $numbers[$i];
        $result[$counts[$index] - 1] = $numbers[$i];
        $counts[$index] -= 1;
        $i -= 1;
    };
    return $result;

}
$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(counting_sort($array));


?>