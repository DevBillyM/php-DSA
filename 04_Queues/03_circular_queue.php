<?php
// 03_circular_queue.php

/**
 * Circular Queue Using Arrays
 * 
 * A circular queue is a queue in which the last position is connected back to the first position.
 * Operations: Enqueue, Dequeue, Front
 */

class CircularQueue {
    private $queue;
    private $size;
    private $front;
    private $rear;

    public function __construct($size) {
        $this->queue = array_fill(0, $size, null);
        $this->size = $size;
        $this->front = $this->rear = -1;
    }

    // Enqueue an element to the queue
    public function enqueue($item) {
        if (($this->rear + 1) % $this->size == $this->front) {
            throw new OverflowException("Queue overflow: Cannot add more items.");
        } elseif ($this->isEmpty()) {
            $this->front = $this->rear = 0;
        } else {
            $this->rear = ($this->rear + 1) % $this->size;
        }
        $this->queue[$this->rear] = $item;
    }

    // Dequeue an element from the queue
    public function dequeue() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue underflow: Cannot dequeue from an empty queue.");
        }
        $data = $this->queue[$this->front];
        if ($this->front == $this->rear) {
            $this->front = $this->rear = -1;
        } else {
            $this->front = ($this->front + 1) % $this->size;
        }
        return $data;
    }

    // Check if the queue is empty
    public function isEmpty() {
        return $this->front == -1;
    }

    // Return the front element without removing it
    public function front() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty.");
        } else {
            return $this->queue[$this->front];
        }
    }

    // Display the queue
    public function display() {
        if ($this->isEmpty()) {
            echo "Queue is empty.\n";
            return;
        }

        echo "Circular Queue: ";
        for ($i = $this->front; $i != $this->rear; $i = ($i + 1) % $this->size) {
            echo $this->queue[$i] . " -> ";
        }
        echo $this->queue[$this->rear] . "\n";
    }
}

// Testing the Circular Queue
$circularQueue = new CircularQueue(5);
$circularQueue->enqueue(10);
$circularQueue->enqueue(20);
$circularQueue->enqueue(30);

echo "Front element: " . $circularQueue->front() . "\n"; // Output: 10
$circularQueue->display(); // Circular Queue: 10 -> 20 -> 30

$circularQueue->dequeue(); // Removes 10
$circularQueue->display(); // Circular Queue: 20 -> 30

?>
