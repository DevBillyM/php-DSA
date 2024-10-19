<?php
// 06_linear_search.php

/**
 * Linear Search Algorithm
 * 
 * Linear Search is the simplest search algorithm. It checks each element of the array
 * one by one until the target value is found or the end of the array is reached.
 * 
 * Time Complexity: O(n)
 * 
 * Let's implement it in PHP with an example.
 */

// Example array to search
$numbers = [64, 25, 12, 22, 11, 90];
$target = 22;

// Function to perform Linear Search
function linearSearch(array $arr, int $target): int {
    $n = count($arr);

    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] === $target) {
            return $i; // Return the index of the target value
        }
    }

    return -1; // Return -1 if the target is not found
}

// Display the array
echo "Array: \n";
print_r($numbers);

// Perform Linear Search
$index = linearSearch($numbers, $target);

// Display the result
if ($index !== -1) {
    echo "Element $target found at index: $index\n";
} else {
    echo "Element $target not found in the array.\n";
}

/**
 * Conclusion:
 * 
 * This script demonstrates the Linear Search algorithm:
 * - It scans the array element by element to find the target value.
 * - Time complexity is O(n) as it potentially checks every element.
 */

?>
