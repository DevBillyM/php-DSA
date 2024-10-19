<?php
// 02_doubly_linked_list.php

/**
 * Doubly Linked List
 * 
 * A doubly linked list consists of nodes where each node points to both the next and previous nodes.
 * 
 * Operations: Insertion, Deletion, Traversal
 */

// Node class for a doubly linked list
class DoublyNode {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Doubly Linked List class
class DoublyLinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    // Inserting a new node at the end of the list
    public function insert($data) {
        $newNode = new DoublyNode($data);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
            $newNode->prev = $current;
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
            if ($this->head !== null) {
                $this->head->prev = null;
            }
            return;
        }

        $current = $this->head;
        while ($current !== null && $current->data !== $data) {
            $current = $current->next;
        }

        // If the node to be deleted is found
        if ($current !== null) {
            if ($current->next !== null) {
                $current->next->prev = $current->prev;
            }
            if ($current->prev !== null) {
                $current->prev->next = $current->next;
            }
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
            echo $current->data . " <-> ";
            $current = $current->next;
        }
        echo "null\n";
    }
}

// Testing the Doubly Linked List
$doublyLinkedList = new DoublyLinkedList();
$doublyLinkedList->insert(10);
$doublyLinkedList->insert(20);
$doublyLinkedList->insert(30);
$doublyLinkedList->insert(40);

echo "List after insertion: \n";
$doublyLinkedList->display();

$doublyLinkedList->delete(30);
echo "List after deleting 30: \n";
$doublyLinkedList->display();

/**
 * Conclusion:
 * 
 * This script implements a Doubly Linked List with basic operations:
 * - Insert: Adds a new node at the end of the list.
 * - Delete: Removes a node from the list.
 * - Display: Traverses and displays the list in both directions.
 */

?>
