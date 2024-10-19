<?php
// 01_hashing_basics.php

/**
 * Hashing Basics
 * 
 * This example demonstrates a simple hash function in PHP.
 * We'll hash keys to indices in an array using the modulo operator.
 */

// Example of a simple hash function
function simpleHash($key, $size) {
    return $key % $size; // Simple modulus-based hash function
}

// Example keys to hash
$keys = [15, 23, 37, 42, 54];

// Size of the hash table
$hashTableSize = 10;

// Creating an empty hash table
$hashTable = array_fill(0, $hashTableSize, null);

// Hashing the keys and storing them in the hash table
foreach ($keys as $key) {
    $hashIndex = simpleHash($key, $hashTableSize);
    $hashTable[$hashIndex] = $key;
    echo "Key $key hashed to index $hashIndex\n";
}

// Displaying the hash table
echo "Hash Table: \n";
print_r($hashTable);

/**
 * Conclusion:
 * 
 * This script demonstrates:
 * - A simple modulus-based hash function.
 * - Storing keys in a hash table.
 * 
 * Note: This example does not handle collisions.
 */

?>
