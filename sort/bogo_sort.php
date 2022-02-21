<?php 

// $numbers = [];
function in_order($numbers) {
    for($i = 0; $i < count($numbers) - 1; $i++) {
        if($numbers[$i] > $numbers[$i + 1]) {
            return false;
        }
    }
    return true;
};

function bogo_sort($numbers) {
    while(!in_order($numbers)) {
        shuffle($numbers);
    };
    return $numbers;
}

$array = [];
for($i = 0; $i < 1000; $i++) {
    $array[] = $i;
}
$array = array_rand($array, 10);
var_dump(bogo_sort($array));
?>