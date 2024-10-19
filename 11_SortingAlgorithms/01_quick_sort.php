<?php
// 01_quick_sort.php

/**
 * Quick Sort
 * 
 * Quick sort is an efficient, divide-and-conquer sorting algorithm. It works by selecting a pivot element
 * and partitioning the array so that elements smaller than the pivot are on the left and elements larger are on the right.
 * It recursively sorts the sub-arrays.
 */

function quickSort(&$arr, $low, $high) {
    if ($low < $high) {
        // Partition the array and get the pivot index
        $pivotIndex = partition($arr, $low, $high);

        // Recursively sort elements before and after partition
        quickSort($arr, $low, $pivotIndex - 1);
        quickSort($arr, $pivotIndex + 1, $high);
    }
}

// Partition function to place pivot at its correct position
function partition(&$arr, $low, $high) {
    $pivot = $arr[$high];  // Pivot element
    $i = $low - 1;  // Index of smaller element

    for ($j = $low; $j < $high; $j++) {
        // If current element is smaller than or equal to pivot
        if ($arr[$j] <= $pivot) {
            $i++;
            swap($arr, $i, $j);
        }
    }

    // Swap pivot with element at i+1
    swap($arr, $i + 1, $high);
    return $i + 1;
}

// Swap two elements in the array
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
