<?php 
function linear_search($numbers, $value) {
    for($i = 0; $i < count($numbers); $i++) {
        if($numbers[$i] == $value) {
            return $i;
        }
    }
    return -1;
}

// function binary_search($numbers, $value) {
//     $left = 0;
//     $right = count($numbers) - 1;
//     while($left <= $right) {
//         echo '##########' . PHP_EOL;
//         $mid = intdiv(($left + $right), 2);
//         if($numbers[$mid] == $value) {
//             return $mid;
//         }elseif($numbers[$mid] < $value) {
//             $left = $mid + 1;
//         }else{
//             $right = $mid - 1;
//         }
//     }
//     return -1;
// }

// 再帰
function binary_search($numbers, $value) {
    function _binary_search($numbers, $value, $left, $right) {
        if($left > $right) {
            return -1;
        }
        $mid = intdiv(($left + $right), 2);
        if($numbers[$mid] == $value) {
            return $mid;
        }elseif($numbers[$mid] < $value) {
            return _binary_search($numbers, $value, $mid+1, $right);
        }else{
            return _binary_search($numbers, $value, $left, $mid+1);
        }
    }
    return _binary_search($numbers, $value, 0, count($numbers) - 1);
}


$nums = [0, 1, 5, 7, 9, 11, 15, 20, 24];
var_dump(binary_search($nums, 15));
?>