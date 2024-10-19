<?php
// 03_queue_array.php

/**
 * Queue Using Arrays
 * 
 * A queue is a data structure that follows the First In, First Out (FIFO) principle.
 * 
 * Operations: Enqueue, Dequeue, Front
 */

class Queue {
    private $queue;
    private $limit;

    public function __construct($limit = 10) {
        $this->queue = [];
        $this->limit = $limit;
    }

    // Enqueue an element to the end of the queue
    public function enqueue($item) {
        if (count($this->queue) < $this->limit) {
            array_push($this->queue, $item);
        } else {
            throw new OverflowException("Queue overflow: Cannot add more items.");
        }
    }

    // Dequeue an element from the front of the queue
    public function dequeue() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue underflow: Cannot dequeue from an empty queue.");
        } else {
            return array_shift($this->queue);
        }
    }

    // Return the front element without removing it
    public function front() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty.");
        } else {
            return $this->queue[0];
        }
    }

    // Check if the queue is empty
    public function isEmpty() {
        return empty($this->queue);
    }

    // Display the queue
    public function display() {
        echo "Queue: ";
        print_r($this->queue);
    }
}

// Testing the Queue
$queue = new Queue(5);
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

echo "Front element: " . $queue->front() . "\n"; // Output: 10
$queue->display(); // Queue: [10, 20, 30]

$queue->dequeue(); // Removes 10
$queue->display(); // Queue: [20, 30]

/**
 * Conclusion:
 * 
 * This script demonstrates a queue using arrays with basic operations:
 * - Enqueue: Adds an element to the end of the queue.
 * - Dequeue: Removes the front element of the queue.
 * - Front: Returns the front element without removing it.
 */

?>
