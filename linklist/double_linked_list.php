<?php 
class Node
{
    function __construct($data,  $next_node = null, $previouse_node = null) {
        $this->data = $data;
        $this->next_node = $next_node;
        $this->previouse_node = $previouse_node;
    }
    
}
class DoubleLikedList {
    function __construct($head = null) 
    {
        $this->head = $head; 
    }
    function append($data) {
        $new_node = new Node($data);
        if (is_null($this->head)) {
            $this->head = $new_node;
            return;
        }

        $current_node = $this->head;
        while($current_node->next_node) {
            $current_node = $current_node->next_node;
        }
        $current_node->next_node = $new_node;
        $new_node->previouse_node = $current_node;
    }
    function insert($data = null) {
        $new_node = new Node($data);
        if (is_null($this->head)) {
            $this->head = $new_node;
            return;
        }
        // $new_node =  new Node($data);

        $this->head->previouse_node = $new_node;
        $new_node->next_node = $this->head;
        // var_dump($new_node->next_node);
        $this->head = $new_node;
        // var_dump($this->head);

    }
    function print() {
        $current_node = $this->head;
        while($current_node){
            var_dump($current_node->data);
            $current_node = $current_node->next_node;
        }
    }
    function remove($data){
        $current_node = $this->head;
            if($current_node && $current_node->data == $data) {
                if(is_null( $current_node->next_node)) {
                    $current_node = null;
                    $this->head = null;
                    return;ß
            }else{
                $next_node = $current_node->next_node;
                $next_node->previouse_node = null;
                $current_node = null; 
                $this->head = $next_node;
                return;
            }
        }

        while($current_node && $current_node->data != $data) {
            $current_node = $current_node->next_node;
        }

        if(is_null($current_node)) {
            return;
        }
        if(is_null($current_node->next_node)) {
            $previouse_node = $current_node->previouse_node;
            $previouse_node->next_node = null;
            $current_node = null;
            return;
        }else{
            $next_node = $current_node->next_node;
            $previouse_node = $current_node->previouse_node;
            $previouse_node->next_node = $next_node;
            $next_node->previouse_node = $previouse_node;
            $current_node = null;
            return;
        }
    }
    function reverse_iterative() {
        $previous_node = null;
        $current_node = $this->head;
        while($current_node) {
            $previous_node = $current_node->previouse_node;
            $current_node->previouse_node = $current_node->next_node;
            $current_node->next_node = $previous_node;

            $current_node = $current_node->previouse_node;

        }
        if($previous_node) {
            $this->head = $previous_node->previouse_node;
        }
    }
    function reverse_recursive() {
        function _reverse_recursive($current_node) {
            if(is_null($current_node)) {
                return null;
            }

            $previous_node = $current_node->previouse_node;
            $current_node->previouse_node = $current_node->next_node;
            $current_node->next_node = $previous_node;
        
            if (is_null( $current_node->previouse_node)) {
                return $current_node;
            };

            return _reverse_recursive($current_node->previouse_node);
        }
        $this->head = _reverse_recursive($this->head);

    }

}

$d = new DoubleLikedList();
$d->append(1);
$d->append(2);
$d->append(3);


$d->insert(0);
$d->insert(4);
$d->print();
// $d->remove(2);
// $d->reverse_iterative();

// $d->print();
// $d->reverse_recursive();

// $d->print();

// var_dump($d->head->data);
// var_dump($d->head->next->data);
// var_dump($d->head->next->next->data);



?>