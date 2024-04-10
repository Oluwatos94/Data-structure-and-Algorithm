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

    public function is_empty() {
        return $this->head === null;
    }

    public function __len__() {
        return $this->count;
    }

    public function add($data) {
        $new_head = new Node($data, null, $this->head);

        if (!$this->is_empty()) {
            $this->head->prev_node = $new_head;
        }

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

    public function node_at_index($index) {
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

    public function insert($data, $index) {
        if ($index >= $this->count) {
            throw new \InvalidArgumentException('index out of range');
        }

        if ($index === 0) {
            $this->add($data);
            return;
        }

        $current_node = $this->node_at_index($index);
        $prev_node = $current_node->prev_node;
        $new_node = new Node($data, $prev_node, $current_node);
        $current_node->prev_node = $new_node;
        $prev_node->next_node = $new_node;

        $this->count++;
    }

    public function remove($key) {
        $current = $this->head;
        $found = false;

        while ($current !== null && !$found) {
            if ($current->data === $key && $current === $this->head) {
                $found = true;
                $this->head = $current->next_node;
                if ($this->head !== null) {
                    $this->head->prev_node = null;
                }
                $this->count--;
                return $current;
            } elseif ($current->data === $key) {
                $found = true;
                $prev_node = $current->prev_node;
                $next_node = $current->next_node;
                $prev_node->next_node = $next_node;
                if ($next_node !== null) {
                    $next_node->prev_node = $prev_node;
                }
                $this->count--;
                return $current;
            } else {
                $current = $current->next_node;
            }
        }
        return null;
    }

    public function remove_at_index($index) {
        if ($index >= $this->count) {
            throw new \InvalidArgumentException('index out of range');
        }

        if ($index === 0) {
            $this->head = $this->head->next_node;
            if ($this->head !== null) {
                $this->head->prev_node = null;
            }
            $this->count--;
            return $this->head;
        }

        $current = $this->node_at_index($index);
        $prev_node = $current->prev_node;
        $next_node = $current->next_node;
        $prev_node->next_node = $next_node;
        if ($next_node !== null) {
            $next_node->prev_node = $prev_node;
        }
        $this->count--;

        return $current;
    }

    public function __iter__() {
        $current = $this->head;

        while ($current !== null) {
            yield $current;
            $current = $current->next_node;
        }
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
