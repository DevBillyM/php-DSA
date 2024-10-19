<?php
// 02_merge_sort.php

/**
 * Merge Sort
 * 
 * Merge sort is a divide-and-conquer algorithm. It divides the array into two halves, sorts each half, and then merges the two sorted halves.
 * It has a guaranteed time complexity of O(n log n).
 */

function mergeSort(&$arr) {
    if (count($arr) <= 1) {
        return;
    }

    // Split the array into two halves
    $mid = intdiv(count($arr), 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    // Recursively sort both halves
    mergeSort($left);
    mergeSort($right);

    // Merge the sorted halves
    merge($arr, $left, $right);
}

// Function to merge two sorted arrays
function merge(&$arr, $left, $right) {
    $i = 0;
    $j = 0;
    $k = 0;

    // Compare elements from left and right arrays, and copy the smaller element into the original array
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $arr[$k++] = $left[$i++];
        } else {
            $arr[$k++] = $right[$j++];
        }
    }

    // Copy remaining elements from left array, if any
    while ($i < count($left)) {
        $arr[$k++] = $left[$i++];
    }

    // Copy remaining elements from right array, if any
    while ($j < count($right)) {
        $arr[$k++] = $right[$j++];
    }
}

// Testing Merge Sort
$arr = [38, 27, 43, 3, 9, 82, 10];
mergeSort($arr);

echo "Sorted array using Merge Sort:\n";
print_r($arr);  // Output: [3, 9, 10, 27, 38, 43, 82]

?>
