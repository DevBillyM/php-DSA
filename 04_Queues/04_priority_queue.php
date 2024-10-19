<?php
// 04_priority_queue.php

/**
 * Priority Queue
 * 
 * A priority queue is a data structure where each element is assigned a priority,
 * and elements with higher priority are dequeued before those with lower priority.
 */

class PriorityQueue {
    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    // Enqueue an element with a priority
    public function enqueue($item, $priority) {
        $this->queue[] = ['item' => $item, 'priority' => $priority];
        usort($this->queue, function($a, $b) {
            return $b['priority'] - $a['priority']; // Higher priority comes first
        });
    }

    // Dequeue the highest priority element
    public function dequeue() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue underflow: Cannot dequeue from an empty queue.");
        } else {
            return array_shift($this->queue)['item'];
        }
    }

    // Check if the queue is empty
    public function isEmpty() {
        return empty($this->queue);
    }

    // Display the priority queue
    public function display() {
        echo "Priority Queue: ";
        foreach ($this->queue as $element) {
            echo "[Item: {$element['item']}, Priority: {$element['priority']}] ";
        }
        echo "\n";
    }
}

// Testing the Priority Queue
$priorityQueue = new PriorityQueue();
$priorityQueue->enqueue("Clean the house", 2);
$priorityQueue->enqueue("Pay bills", 1);
$priorityQueue->enqueue("Do homework", 3);

$priorityQueue->display(); // Priority Queue: [Item: Do homework, Priority: 3] [Item: Clean the house, Priority: 2] [Item: Pay bills, Priority: 1]

echo "Dequeued: " . $priorityQueue->dequeue() . "\n"; // Output: Do homework
$priorityQueue->display(); // Priority Queue: [Item: Clean the house, Priority: 2] [Item: Pay bills, Priority: 1]

?>
