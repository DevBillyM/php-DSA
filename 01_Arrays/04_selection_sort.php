<?php
// 04_selection_sort.php

/**
 * Selection Sort Algorithm
 * 
 * Selection Sort works by repeatedly finding the minimum element from the unsorted part of the array
 * and moving it to the beginning. This process continues until the entire array is sorted.
 * 
 * Time Complexity: O(n^2)
 * 
 * Let's implement it in PHP with an example.
 */

// Example array to sort
$numbers = [64, 25, 12, 22, 11];

// Function to perform Selection Sort
function selectionSort(array $arr): array {
    $n = count($arr);

    // Traverse through all elements of the array
    for ($i = 0; $i < $n - 1; $i++) {
        // Find the minimum element in the unsorted part of the array
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        // Swap the found minimum element with the first element of the unsorted part
        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }

    return $arr;
}

// Display the original array
echo "Original array: \n";
print_r($numbers);

// Sorting the array using Selection Sort
$sortedNumbers = selectionSort($numbers);

// Display the sorted array
echo "Sorted array (Selection Sort): \n";
print_r($sortedNumbers);

/**
 * Conclusion:
 * 
 * This script demonstrates the Selection Sort algorithm:
 * - It finds the minimum element from the unsorted part of the array and swaps it with the current element.
 * - The time complexity is O(n^2), making it inefficient for large datasets.
 * 
 * Selection Sort is conceptually simpler than other sorting algorithms, but not the most efficient.
 */

?>
