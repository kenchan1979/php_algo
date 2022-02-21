<?php 
function counting_sort($numbers, $place) {
    // $max_num = max($numbers);

    $counts = [];
    for($i = 0; $i < 10 ;$i++) {
        $counts[$i] = 0;
    }
    $result = [];
    for($i = 0; $i < count($numbers); $i++) {
        $result[$i] = 0;
    }
    foreach($numbers as $num) {
        $index = intval($num / $place) % 10;
        $counts[$index] += 1; 
    }

    for($i = 1; $i < 10; $i++) {
        $counts[$i] += $counts[$i-1];
    }
    $i = count($numbers) - 1;
    while($i >= 0) {
        $index = intval($numbers[$i]/$place) % 10;
        $result[$counts[$index] - 1] = $numbers[$i];
        $counts[$index] -= 1;
        $i -= 1;
    };
    return $result;
}

function radix_sort($numbers) {
    $max_num = max($numbers);
    // 桁数
    $place = 1;
    while($max_num > $place) {
        $numbers = counting_sort($numbers, $place);
        $place *= 10;
    }
    return $numbers;
}

$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i; 
}
$array = array_rand($array, 10);
var_dump(radix_sort($array));


?>