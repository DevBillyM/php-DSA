<?php
// 03_binary_search.php

/**
 * Binary Search
 * 
 * Binary search is an efficient algorithm for finding an element in a sorted array.
 * It divides the array into two halves and recursively searches the relevant half.
 */

function binarySearch($arr, $target, $low, $high) {
    if ($low > $high) {
        return -1; // Element not found
    }

    $mid = intdiv($low + $high, 2);

    if ($arr[$mid] == $target) {
        return $mid; // Element found
    } elseif ($arr[$mid] > $target) {
        return binarySearch($arr, $target, $low, $mid - 1); // Search left half
    } else {
        return binarySearch($arr, $target, $mid + 1, $high); // Search right half
    }
}

// Testing Binary Search
$arr = [2, 3, 4, 10, 40];
$target = 10;
$result = binarySearch($arr, $target, 0, count($arr) - 1);

if ($result != -1) {
    echo "Element found at index: $result\n";  // Output: Element found at index: 3
} else {
    echo "Element not found in the array.\n";
}

?>
