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

function bucket_sort($numbers) {
    $max_num = max($numbers);
    $len_numbers = count($numbers);
    $size = intdiv($max_num, $len_numbers);  //割算、整数の解
    var_dump($size);

    // 配列に配列を作る（ネスト）
    $buckets = array(); 
    for($i = 0; $i < $size; $i++) {
        $buckets[$i] = array();

    }

    foreach($numbers as $num) {
        $i = intdiv($num, $size);
        if($i != $size) {
            array_push($buckets[$i], $num);
        }else {
            array_push($buckets[$size-1], $num);
        } 
    }

    for($i = 0; $i < $size; $i++) {
        // 微妙な場所
        $buckets[$i] = insert_sort($buckets[$i]);
    }

    $result = [];
    for($i = 0; $i < $size; $i++) {
        $result[] = $buckets[$i];
    }
    return $result;

}

// $array = [];
// for($i = 0; $i < 1000; $i++) {
//     $array[] = $i; 
// }
// $array = array_rand($array, 10);
// var_dump(bucket_sort($array));

$array1 = [2, 4, 6, 5, 3, 1, 12, 67, 55, 44, 33, 22, 78, 89, 90, 98, 87, 76, 665, 644];
var_dump(bucket_sort($array1));

