<?php

class node
{
    /**
 * an object for storing a single node in a linked list
 * 
 * Attributes:
 *  data: data stored in node
 *  Next_node: Reference to the next node in the linked list
 * 
 */

    public $data;
    public $next_node;

    public function __construct($data, $next_node = null){
        $this->data = $data;
        $this->next_node = $next_node;
    }

    public function toString(){
        return "<node data: {$this->data}>";
    }
}

class singlyLinkedList 
{
    /**
     * Linear data struture that stores data in node: Maintains a reference to the first node also called head.
     * Each nodes points to the next nodes in the list
     * 
     * Attributes:
     *      Head: The head node of the list
     */
    public $head;
    public $count;

    public function __construct(){
        $this->head = null;
        // Maintaining a count attribute allows for len() to be implemented in constant time
        $this->count = 0;
    }

    public function is_empty(){
        /**
         * Determines if the linked list is empty
         * Takes O(1) time
         */

        return $this->head === null;
    }

    public function count(){
        /**
         * Returns the length of the linked list
         * Takes O(1) time
         */
        return $this->count;
    }
}

// Create a new instance of SinglyLinkedList
$linkedList = new SinglyLinkedList();

// Check if the linked list is empty
echo $linkedList->is_Empty() ? "Linked list is empty\n" : "Linked list is not empty\n";

// Create some nodes
$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);

// Link the nodes together
$node1->next_node = $node2;
$node2->next_node = $node3;

// Set the head of the linked list
$linkedList->head = $node1;
$linkedList->count = 3;

// Check if the linked list is empty again
echo $linkedList->is_Empty() ? "Linked list is empty\n" : "Linked list is not empty\n";

// Check the length of the linked list
echo "Length of the linked list: " . $linkedList->count() . "\n";