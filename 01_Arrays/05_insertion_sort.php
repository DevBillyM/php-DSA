<?php
// 05_insertion_sort.php

/**
 * Insertion Sort Algorithm
 * 
 * Insertion Sort builds the sorted array one element at a time by comparing
 * the current element to the previous elements and shifting them as needed.
 * 
 * Time Complexity: O(n^2)
 * 
 * Let's implement it in PHP with an example.
 */

// Example array to sort
$numbers = [64, 25, 12, 22, 11];

// Function to perform Insertion Sort
function insertionSort(array $arr): array {
    $n = count($arr);

    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        // Shift elements of $arr[0..$i-1] that are greater than $key to one position ahead
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j = $j - 1;
        }

        $arr[$j + 1] = $key;
    }

    return $arr;
}

// Display the original array
echo "Original array: \n";
print_r($numbers);

// Sorting the array using Insertion Sort
$sortedNumbers = insertionSort($numbers);

// Display the sorted array
echo "Sorted array (Insertion Sort): \n";
print_r($sortedNumbers);

/**
 * Conclusion:
 * 
 * This script demonstrates the Insertion Sort algorithm:
 * - It compares the current element with previous ones and shifts them until the correct spot is found.
 * - The time complexity is O(n^2), but it works well for small or nearly sorted arrays.
 */

?>
