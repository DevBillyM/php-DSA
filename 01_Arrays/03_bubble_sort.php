<?php
// 03_bubble_sort.php

/**
 * Bubble Sort Algorithm
 * 
 * Bubble Sort is a simple sorting algorithm that repeatedly steps through the list,
 * compares adjacent elements, and swaps them if they are in the wrong order.
 * This process continues until the list is sorted.
 * 
 * Time Complexity: O(n^2)
 * 
 * Let's implement it in PHP with an example.
 */

// Example array to sort
$numbers = [64, 34, 25, 12, 22, 11, 90];

// Function to perform Bubble Sort
function bubbleSort(array $arr): array {
    $n = count($arr);

    // Traverse through all elements
    for ($i = 0; $i < $n - 1; $i++) {
        // Last i elements are already sorted, no need to check them
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Swap if the element is greater than the next
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }

    return $arr;
}

// Display the original array
echo "Original array: \n";
print_r($numbers);

// Sorting the array using Bubble Sort
$sortedNumbers = bubbleSort($numbers);

// Display the sorted array
echo "Sorted array (Bubble Sort): \n";
print_r($sortedNumbers);

/**
 * Conclusion:
 * 
 * This script demonstrates the Bubble Sort algorithm:
 * - It repeatedly compares adjacent elements and swaps them if they are in the wrong order.
 * - The algorithm has a time complexity of O(n^2), which makes it inefficient for large datasets.
 * 
 * This is a good starting point for learning basic sorting algorithms.
 */

?>
