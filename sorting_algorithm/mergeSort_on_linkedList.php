<?php

class Node {
    public $data;
    public $next_node;

    public function __construct($data, $next_node = null) {
        $this->data = $data;
        $this->next_node = $next_node;
    }
}

class LinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    // Function to calculate the size of the linked list
    public function size() {
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            $count++;
            $current = $current->next_node;
        }
        return $count;
    }

    // Function to get the node at a specific index
    public function node_at_index($index) {
        if ($index >= $this->size()) {
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

    // Function to add a new node to the end of the linked list
    public function add($data) {
        $new_node = new Node($data);
        if ($this->head === null) {
            $this->head = $new_node;
        } else {
            $current = $this->head;
            while ($current->next_node !== null) {
                $current = $current->next_node;
            }
            $current->next_node = $new_node;
        }
    }
}

// Recursive merge sort function
function merge_sort($linked_list) {
    // Base cases
    if ($linked_list->size() === 1) {
        return $linked_list;
    } elseif ($linked_list->head === null) {
        return $linked_list;
    }

    // Split the list into two halves
    list($left_half, $right_half) = split_list($linked_list);
    // Recursively sort each half
    $left = merge_sort($left_half);
    $right = merge_sort($right_half);
    // Merge the sorted halves
    return merge($left, $right);
}

// Function to split a linked list into two halves
function split_list($linked_list) {
    if ($linked_list === null || $linked_list->head === null) {
        $left_half = $linked_list;
        $right_half = null;
        return [$left_half, $right_half];
    } else {
        $size = $linked_list->size();
        $mid = (int)($size / 2);
        $mid_node = $linked_list->node_at_index($mid - 1);

        $left_half = $linked_list;
        $right_half = new LinkedList();
        $right_half->head = $mid_node->next_node;
        $mid_node->next_node = null;

        return [$left_half, $right_half];
    }
}

// Function to merge two sorted linked lists
function merge($left, $right) {
    // Create a new linked list to hold the merged result
    $merged = new LinkedList();
    // Add a fake head that will be discarded later
    $merged->add(0);
    $current = $merged->head;

    // Get the head nodes of the left and right lists
    $left_head = $left->head;
    $right_head = $right->head;

    // Merge the two lists
    while ($left_head !== null || $right_head !== null) {
        if ($left_head === null) {
            $current->next_node = $right_head;
            $right_head = $right_head->next_node;
        } elseif ($right_head === null) {
            $current->next_node = $left_head;
            $left_head = $left_head->next_node;
        } else {
            $left_data = $left_head->data;
            $right_data = $right_head->data;

            if ($left_data < $right_data) {
                $current->next_node = $left_head;
                $left_head = $left_head->next_node;
            } else {
                $current->next_node = $right_head;
                $right_head = $right_head->next_node;
            }
        }
        $current = $current->next_node;
    }

    // Discard the fake head and set the first merged node as the head
    $head = $merged->head->next_node;
    $merged->head = $head;

    return $merged;
}

// Example usage:
$linkedList = new LinkedList();
$linkedList->add(5);
$linkedList->add(9);
$linkedList->add(1);
$linkedList->add(3);
$linkedList->add(4);
$linkedList->add(6);
$linkedList->add(6);
$linkedList->add(3);
$linkedList->add(2);

$sortedList = merge_sort($linkedList);
$current = $sortedList->head;
while ($current !== null) {
    echo $current->data . " ";
    $current = $current->next_node;
}
