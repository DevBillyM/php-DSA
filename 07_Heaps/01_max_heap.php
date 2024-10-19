<?php
// 01_max_heap.php

/**
 * Max Heap
 * 
 * A max heap is a binary tree where the root node is greater than or equal to its children.
 * This implementation uses an array to store the heap.
 */

class MaxHeap {
    private $heap;

    public function __construct() {
        $this->heap = [];
    }

    // Insert an element into the heap
    public function insert($data) {
        $this->heap[] = $data;
        $this->heapifyUp(count($this->heap) - 1);
    }

    // Heapify up: ensures the heap property is maintained after insertion
    private function heapifyUp($index) {
        $parentIndex = intval(($index - 1) / 2);

        if ($index > 0 && $this->heap[$index] > $this->heap[$parentIndex]) {
            $this->swap($index, $parentIndex);
            $this->heapifyUp($parentIndex);
        }
    }

    // Extract the maximum element (the root) from the heap
    public function extractMax() {
        if (count($this->heap) == 0) {
            throw new UnderflowException("Heap is empty.");
        }

        $maxValue = $this->heap[0];
        $this->heap[0] = $this->heap[count($this->heap) - 1];
        array_pop($this->heap);

        $this->heapifyDown(0);

        return $maxValue;
    }

    // Heapify down: ensures the heap property is maintained after extraction
    private function heapifyDown($index) {
        $leftChild = 2 * $index + 1;
        $rightChild = 2 * $index + 2;
        $largest = $index;

        if ($leftChild < count($this->heap) && $this->heap[$leftChild] > $this->heap[$largest]) {
            $largest = $leftChild;
        }

        if ($rightChild < count($this->heap) && $this->heap[$rightChild] > $this->heap[$largest]) {
            $largest = $rightChild;
        }

        if ($largest != $index) {
            $this->swap($index, $largest);
            $this->heapifyDown($largest);
        }
    }

    // Swap two elements in the heap
    private function swap($i, $j) {
        $temp = $this->heap[$i];
        $this->heap[$i] = $this->heap[$j];
        $this->heap[$j] = $temp;
    }

    // Display the heap
    public function display() {
        print_r($this->heap);
    }
}

// Testing Max Heap
$heap = new MaxHeap();
$heap->insert(20);
$heap->insert(15);
$heap->insert(30);
$heap->insert(40);
$heap->insert(10);

echo "Heap after insertions: ";
$heap->display(); // Output: Heap after insertions: [40, 20, 30, 15, 10]

echo "Extracted max: " . $heap->extractMax() . "\n"; // Output: Extracted max: 40
$heap->display(); // Output: Heap after extraction: [30, 20, 10, 15]

?>
