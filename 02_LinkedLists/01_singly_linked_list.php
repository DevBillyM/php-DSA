<?php
// 01_singly_linked_list.php

/**
 * Singly Linked List
 * 
 * A singly linked list consists of nodes where each node points to the next node in the list.
 * 
 * Operations: Insertion, Deletion, Traversal
 */

// Node class for a singly linked list
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Singly Linked List class
class SinglyLinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    // Inserting a new node at the end of the list
    public function insert($data) {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    // Deleting a node from the list
    public function delete($data) {
        if ($this->head === null) {
            return;
        }

        // If the node to be deleted is the head
        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        // If the node to be deleted is found
        if ($current->next !== null) {
            $current->next = $current->next->next;
        }
    }

    // Traversing and displaying the list
    public function display() {
        if ($this->head === null) {
            echo "The list is empty.\n";
            return;
        }

        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null\n";
    }
}

// Testing the Singly Linked List
$linkedList = new SinglyLinkedList();
$linkedList->insert(10);
$linkedList->insert(20);
$linkedList->insert(30);
$linkedList->insert(40);

echo "List after insertion: \n";
$linkedList->display();

$linkedList->delete(20);
echo "List after deleting 20: \n";
$linkedList->display();

/**
 * Conclusion:
 * 
 * This script implements a Singly Linked List with basic operations:
 * - Insert: Adds a new node at the end of the list.
 * - Delete: Removes a node from the list.
 * - Display: Traverses and displays the list.
 */

?>
