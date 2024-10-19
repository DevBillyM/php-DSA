<?php
// 07_binary_search.php

/**
 * Binary Search Algorithm
 * 
 * Binary Search works on sorted arrays by repeatedly dividing the search interval in half.
 * If the target value is less than the middle element, the search continues in the left half;
 * otherwise, it continues in the right half. This process repeats until the target is found.
 * 
 * Time Complexity: O(log n)
 * 
 * Let's implement it in PHP with an example.
 */

// Example sorted array to search
$numbers = [11, 12, 22, 25, 64, 90];
$target = 25;

// Function to perform Binary Search
function binarySearch(array $arr, int $target): int {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $mid = intval(($low + $high) / 2);

        // Check if the target is at mid
        if ($arr[$mid] === $target) {
            return $mid;
        }

        // If target is greater, ignore the left half
        if ($arr[$mid] < $target) {
            $low = $mid + 1;
        }
        // If target is smaller, ignore the right half
        else {
            $high = $mid - 1;
        }
    }

    return -1; // Return -1 if the target is not found
}

// Display the sorted array
echo "Sorted array: \n";
print_r($numbers);

// Perform Binary Search
$index = binarySearch($numbers, $target);

// Display the result
if ($index !== -1) {
    echo "Element $target found at index: $index\n";
} else {
    echo "Element $target not found in the array.\n";
}

/**
 * Conclusion:
 * 
 * This script demonstrates the Binary Search algorithm:
 * - It works on sorted arrays by repeatedly halving the search space.
 * - Time complexity is O(log n), making it more efficient than linear search for large arrays.
 */

?>
