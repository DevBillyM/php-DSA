<?php
// 02_queue_linked_list.php

/**
 * Queue Using Linked List
 * 
 * A queue follows the First In, First Out (FIFO) principle.
 * Operations: Enqueue, Dequeue, Front
 */

// Node class for the linked list
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Queue class implemented using a linked list
class LinkedListQueue {
    private $front;
    private $rear;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
    }

    // Enqueue an element to the end of the queue
    public function enqueue($data) {
        $newNode = new Node($data);

        if ($this->rear === null) {
            $this->front = $this->rear = $newNode;
        } else {
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
    }

    // Dequeue an element from the front of the queue
    public function dequeue() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue underflow: Cannot dequeue from an empty queue.");
        } else {
            $dequeuedValue = $this->front->data;
            $this->front = $this->front->next;

            // If front becomes null, set rear to null as well
            if ($this->front === null) {
                $this->rear = null;
            }

            return $dequeuedValue;
        }
    }

    // Return the front element without removing it
    public function front() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty.");
        } else {
            return $this->front->data;
        }
    }

    // Check if the queue is empty
    public function isEmpty() {
        return $this->front === null;
    }

    // Display the queue
    public function display() {
        $current = $this->front;
        echo "Queue: ";
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null\n";
    }
}

// Testing the Queue using Linked List
$linkedListQueue = new LinkedListQueue();
$linkedListQueue->enqueue(10);
$linkedListQueue->enqueue(20);
$linkedListQueue->enqueue(30);

echo "Front element: " . $linkedListQueue->front() . "\n"; // Output: 10
$linkedListQueue->display(); // Queue: 10 -> 20 -> 30 -> null

$linkedListQueue->dequeue(); // Removes 10
$linkedListQueue->display(); // Queue: 20 -> 30 -> null

?>
