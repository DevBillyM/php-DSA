<?php
// 03_quick_sort.php

/**
 * Quick Sort using Divide and Conquer
 * 
 * Quick sort is an efficient, divide-and-conquer algorithm. It works by selecting a pivot element and partitioning
 * the array into two sub-arrays: one with elements smaller than the pivot and one with elements larger.
 */

function quickSort(&$arr, $low, $high) {
    if ($low < $high) {
        $pivotIndex = partition($arr, $low, $high);
        quickSort($arr, $low, $pivotIndex - 1);  // Recursively sort left sub-array
        quickSort($arr, $pivotIndex + 1, $high); // Recursively sort right sub-array
    }
}

function partition(&$arr, $low, $high) {
    $pivot = $arr[$high];
    $i = $low - 1;

    for ($j = $low; $j < $high; $j++) {
        if ($arr[$j] <= $pivot) {
            $i++;
            swap($arr, $i, $j);
        }
    }

    swap($arr, $i + 1, $high);
    return $i + 1;
}

function swap(&$arr, $a, $b) {
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
}

// Testing Quick Sort
$arr = [10, 80, 30, 90, 40, 50, 70];
quickSort($arr, 0, count($arr) - 1);

echo "Sorted array using Quick Sort:\n";
print_r($arr);  // Output: [10, 30, 40, 50, 70, 80, 90]

?>
