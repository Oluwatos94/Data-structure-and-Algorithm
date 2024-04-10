<?php

class Node {
    public $data;
    public $next_node;

    public function __construct($data, $next_node = null) {
        $this->data = $data;
        $this->next_node = $next_node;
    }

    public function __toString() {
        return "<Node data: $this->data>";
    }
}

class SinglyLinkedList {
    private $head;
    private $count;

    public function __construct() {
        $this->head = null;
        $this->count = 0;
    }

    public function isEmpty() {
        return $this->head === null;
    }

    public function __len__() {
        return $this->count;
    }

    public function add($data) {
        $new_head = new Node($data, $this->head);
        $this->head = $new_head;
        $this->count++;
    }

    public function search($key) {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $key) {
                return $current;
            } else {
                $current = $current->next_node;
            }
        }
        return null;
    }

    public function insert($data, $index) {
        $current = new node($data);

        if ($index >= $this->count) {
            throw new \InvalidArgumentException('index out of range');
        }

        if ($index === 0) {
            $this->add($data);
            return;
        }

        $new_node = new Node($data);
        $position = $index;
        $current = $this->head;

        while ($position > 1) {
            $current = $current->next_node;
            $position--;
        }

        $prev_node = $current;
        $next_node = $current->next_node;

        $prev_node->next_node = $new_node;
        $new_node->next_node = $next_node;

        $this->count++;
    }

    public function nodeAtIndex($index) {
        if ($index >= $this->count) {
            throw new \InvalidArgumentException('index out of range');
        }

        if ($index === 0) {
            return $this->head;
        }

        $current = $this->head;
        $position = 0;

        while ($position < $index) {
            $current = $current->next_node;
            $position++;
        }

        return $current;
    }

    public function remove($key) {
        $current = $this->head;
        $previous = null;
        $found = false;

        while ($current !== null && !$found) {
            if ($current->data === $key && $current === $this->head) {
                $found = true;
                $this->head = $current->next_node;
                $this->count--;
                return $current;
            } elseif ($current->data === $key) {
                $found = true;
                $previous->next_node = $current->next_node;
                $this->count--;
                return $current;
            } else {
                $previous = $current;
                $current = $current->next_node;
            }
        }
        return null;
    }

    public function removeAtIndex($index) {
        if ($index >= $this->count) {
            throw new \InvalidArgumentException('index out of range');
        }

        $current = $this->head;

        if ($index === 0) {
            $this->head = $current->next_node;
            $this->count--;
            return $current;
        }

        $position = $index;

        while ($position > 1) {
            $current = $current->next_node;
            $position--;
        }

        $prev_node = $current;
        $current = $current->next_node;
        $next_node = $current->next_node;

        $prev_node->next_node = $next_node;
        $this->count--;

        return $current;
    }

    public function __toString() {
        $nodes = [];
        $current = $this->head;

        while ($current !== null) {
            if ($current === $this->head) {
                $nodes[] = "[Head: $current->data]";
            } elseif ($current->next_node === null) {
                $nodes[] = "[Tail: $current->data]";
            } else {
                $nodes[] = "[$current->data]";
            }
            $current = $current->next_node;
        }

        return implode(' -> ', $nodes);
    }
}
