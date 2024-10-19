<?php
// 03_heap_sort.php

/**
 * Heap Sort
 * 
 * Heap sort is an efficient sorting algorithm that uses a heap to sort elements.
 * It can be implemented using either a max heap (for ascending order) or a min heap (for descending order).
 */

// Heapify function to build a max heap
function heapify(&$arr, $n, $i) {
    $largest = $i; 
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    // If the left child is larger than the root
    if ($left < $n && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }

    // If the right child is larger than the largest so far
    if ($right < $n && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }

    // If the largest is not the root
    if ($largest != $i) {
        // Swap the root with the largest
        $temp = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $temp;

        // Recursively heapify the affected sub-tree
        heapify($arr, $n, $largest);
    }
}

// Heap sort function
function heapSort(&$arr) {
    $n = count($arr);

    // Build a max heap
    for ($i = intval($n / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $n, $i);
    }

    // One by one extract elements from the heap
    for ($i = $n - 1; $i > 0; $i--) {
        // Move the current root to the end
        $temp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $temp;

        // Heapify the reduced heap
        heapify($arr, $i, 0);
    }
}

// Testing Heap Sort
$arr = [12, 11, 13, 5, 6, 7];
heapSort($arr);

echo "Sorted array is: \n";
print_r($arr); // Output: [5, 6, 7, 11, 12, 13]

?>
