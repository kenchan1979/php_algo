<?php 
class HashTable
{
    function __construct($size = 10)
    {
        $this->size = $size;
        $this->buckets = array(); 
        for($i = 0; $i < $size; $i++) {
            $this->buckets[$i] = array();
        }
    }
    
}

$hash = new HashTable();
var_dump($hash);
?>