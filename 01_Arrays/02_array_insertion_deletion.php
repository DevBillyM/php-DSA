<?php
// 02_array_insertion_deletion.php

/**
 * Inserting and Deleting Elements in Arrays
 * 
 * This script demonstrates how to add and remove elements from arrays using PHP.
 */

// Creating an array of numbers
$numbers = [1, 2, 3, 4, 5];

// Insert an element at the end of the array using array_push()
array_push($numbers, 6);
echo "After pushing 6: ";
print_r($numbers); // Output: [1, 2, 3, 4, 5, 6]

// Insert an element at the beginning of the array using array_unshift()
array_unshift($numbers, 0);
echo "After unshifting 0: ";
print_r($numbers); // Output: [0, 1, 2, 3, 4, 5, 6]

// Insert an element at a specific index
$index = 3;
$value = 99;
array_splice($numbers, $index, 0, $value);
echo "After inserting 99 at index 3: ";
print_r($numbers); // Output: [0, 1, 2, 99, 3, 4, 5, 6]

// Delete the last element using array_pop()
array_pop($numbers);
echo "After popping the last element: ";
print_r($numbers); // Output: [0, 1, 2, 99, 3, 4, 5]

// Delete the first element using array_shift()
array_shift($numbers);
echo "After shifting the first element: ";
print_r($numbers); // Output: [1, 2, 99, 3, 4, 5]

// Delete an element at a specific index
$indexToRemove = 2;
unset($numbers[$indexToRemove]);
echo "After removing the element at index 2: ";
print_r($numbers); // Output: [1, 2, 3, 4, 5] (Note: The array will have a gap at the removed index)

// Reindexing the array to remove gaps after using unset()
$numbers = array_values($numbers);
echo "After reindexing: ";
print_r($numbers); // Output: [1, 2, 3, 4, 5]

/**
 * Conclusion:
 * 
 * This script covers:
 * - Adding elements to the beginning, end, and specific indices of arrays.
 * - Removing elements from the beginning, end, and specific indices.
 * - Using array functions like array_push(), array_pop(), array_unshift(), array_shift(), and array_splice().
 * - Reindexing an array after deleting an element.
 */

?>
