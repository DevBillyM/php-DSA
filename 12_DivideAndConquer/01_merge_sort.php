<?php
// 01_merge_sort.php

/**
 * Merge Sort using Divide and Conquer
 * 
 * Merge sort is a stable, divide-and-conquer sorting algorithm that recursively divides an array
 * into two halves, sorts each half, and then merges them.
 */

function mergeSort(&$arr) {
    if (count($arr) <= 1) {
        return;
    }

    // Divide the array into two halves
    $mid = intdiv(count($arr), 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    // Recursively sort both halves
    mergeSort($left);
    mergeSort($right);

    // Merge the sorted halves
    merge($arr, $left, $right);
}

function merge(&$arr, $left, $right) {
    $i = 0;
    $j = 0;
    $k = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $arr[$k++] = $left[$i++];
        } else {
            $arr[$k++] = $right[$j++];
        }
    }

    while ($i < count($left)) {
        $arr[$k++] = $left[$i++];
    }

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
