<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Node{
    public $data;
    public $next_node;

    function __construct($data, $next_node = null)
    {
        $this->data = $data;
        $this->next = $next_node;
    }
}

class LinkedList
{
    function __construct($head = null)
    {
        $this->head = $head;
    }

    function append($data) {
        $new_node = new Node($data);
        if(is_null($this->head)) {
            $this->head = $new_node;
            return;
        }
        $last_node = $this->head;
        while($last_node->next) {
            $last_node = $last_node->next;
        }
        $last_node->next = $new_node;
    }

    function insert($data) {
        $new_node = new Node($data);
        $new_node->next = $this->head;
        $this->head = $new_node;
    }
    function print() {
        $current_node = $this->head;
        while($current_node) {
            var_dump($current_node->data);
            $current_node = $current_node->next;
        }
    }
    function remove($data) {
        $current_node = $this->head;
        if($current_node && $current_node->data == $data) {
            $this->head = $current_node->next;
            $current_node = null;
            return;
        }
        $previouse_node = null;
        while($current_node && $current_node->data != $data) {
            $previouse_node = $current_node;
            $current_node = $current_node->next;
        }
        if(is_null($current_node)) {
            return;
        }

        $previouse_node->next = $current_node->next;
        $current_node = null;

    }
    function reverse_iterative() {
        $previouse_node = null;
        $current_node = $this->head;
        while($current_node) {
            $next_node = $current_node->next;
            $current_node->next = $previouse_node;

            $previouse_node = $current_node;
            $current_node = $next_node;
        }
        $this->head = $previouse_node;
    }
    function reverse_recursive() {
        function _reverse_recursive($current_node, $previouse_node) {
            if(is_null($current_node)) {
                return $previouse_node;
            };

            $next_node = $current_node->next;
            $current_node->next = $previouse_node;
            $previouse_node = $current_node;
            $current_node = $next_node;
            return _reverse_recursive($current_node, $previouse_node);
        }
        $this->head = _reverse_recursive($this->head, null);
    }
    function reverse_even() {
        function _reverse_even($head, $previouse_node) {
            if(is_null($head)) {
                return null;
            }

            $current_node = $head;
            while($current_node && $current_node->data % 2 == 0) {
                $next_node = $current_node->next;
                $current_node->next = $previouse_node;
    
                $previouse_node = $current_node;
                $current_node = $next_node;
            }
            if($current_node != $head) {
                $head->next = $current_node;
                _reverse_even($current_node, null);
                return $previouse_node;
            }else {
                $head->next = _reverse_even($head->next, $head);
                return $head;
            }

        }
        $this->head = _reverse_even($this->head, null);

    }

}
$l = new LinkedList();
// $l->append(0);
$l->append(2);
$l->append(4);
$l->append(6);
$l->append(1);
$l->append(3);
$l->append(5);
$l->append(2);
$l->append(4);
$l->append(6);


// $l->insert(0);
$l->print();

var_dump('#########');
// $l->remove(1);
// $l->reverse_iterative();
// $l->print();
// var_dump('########');

// $l->reverse_recursive();
$l->reverse_even();

$l->print();

// var_dump($l->head->data);
// var_dump($l->head->next->data);


?>