<?php

class Node {
    public $data;
    public $prev_node;
    public $next_node;

    public function __construct($data, $prev_node = null, $next_node = null) {
        $this->data = $data;
        $this->prev_node = $prev_node;
        $this->next_node = $next_node;
    }

    public function __toString() {
        return "<Node data: $this->data>";
    }
}

class DoublyLinkedList {
    private $head;
    private $count;

    public function __construct() {
        $this->head = null;
        $this->count = 0;
    }

    public function isEmpty() {
        return $this->head === null;
    }

    public function __toString() {
        return "<DoublyLinkedList length: $this->count>";
    }

    public function __len__() {
        return $this->count;
    }
}
