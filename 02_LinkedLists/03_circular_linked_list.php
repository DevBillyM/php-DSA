<?php
// 03_circular_linked_list.php

/**
 * Circular Linked List
 * 
 * A circular linked list is similar to a singly linked list, except that the last node points back to the first node,
 * forming a circular structure.
 * 
 * Operations: Insertion, Deletion, Traversal
 */

// Node class for a circular linked list
class CircularNode {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Circular Linked List class
class CircularLinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    // Inserting a new node at the end of the list
    public function insert($data) {
        $newNode = new CircularNode($data);

        if ($this->head === null) {
            $this->head = $newNode;
            $newNode->next = $this->head; // Point to itself, making it circular
        } else {
            $current = $this->head;
            while ($current->next !== $this->head) {
                $current = $current->next;
            }
            $current->next = $newNode;
            $newNode->next = $this->head; // Link back to head
        }
    }

    // Deleting a node from the list
    public function delete($data) {
        if ($this->head === null) {
            return;
        }

        // If the node to be deleted is the head
        if ($this->head->data === $data) {
            if ($this->head->next === $this->head) { // Only one node in the list
                $this->head = null;
            } else {
                $current = $this->head;
                while ($current->next !== $this->head) {
                    $current = $current->next;
                }
                $current->next = $this->head->next;
                $this->head = $this->head->next;
            }
            return;
        }

        $current = $this->head;
        while ($current->next !== $this->head && $current->next->data !== $data) {
            $current = $current->next;
        }

        // If the node to be deleted is found
        if ($current->next !== $this->head) {
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
        do {
            echo $current->data . " -> ";
            $current = $current->next;
        } while ($current !== $this->head);
        echo "(back to head)\n";
    }
}

// Testing the Circular Linked List
$circularLinkedList = new CircularLinkedList();
$circularLinkedList->insert(10);
$circularLinkedList->insert(20);
$circularLinkedList->insert(30);
$circularLinkedList->insert(40);

echo "List after insertion: \n";
$circularLinkedList->display();

$circularLinkedList->delete(20);
echo "List after deleting 20: \n";
$circularLinkedList->display();

/**
 * Conclusion:
 * 
 * This script implements a Circular Linked List with basic operations:
 * - Insert: Adds a new node at the end of the list.
 * - Delete: Removes a node from the list.
 * - Display: Traverses and displays the list.
 */

?>
