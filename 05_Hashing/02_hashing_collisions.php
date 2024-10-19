<?php
// 02_hashing_collisions.php

/**
 * Hashing with Chaining (Collision Handling)
 * 
 * This example demonstrates how to handle collisions using chaining.
 * Chaining involves storing multiple values at the same index using a linked list or an array.
 */

// Example of a hash function
function hashFunction($key, $arraySize) {
    return $key % $arraySize;
}

// Example class for handling collisions using chaining
class HashTableWithChaining {
    private $table;
    private $size;

    public function __construct($size) {
        $this->size = $size;
        $this->table = array_fill(0, $size, []);
    }

    // Insert a key-value pair into the hash table
    public function insert($key, $value) {
        $hashIndex = hashFunction($key, $this->size);

        // Insert the key-value pair at the index (chaining with an array)
        $this->table[$hashIndex][] = ['key' => $key, 'value' => $value];

        echo "Key $key hashed to index $hashIndex\n";
    }

    // Find a value by key in the hash table
    public function find($key) {
        $hashIndex = hashFunction($key, $this->size);
        foreach ($this->table[$hashIndex] as $item) {
            if ($item['key'] === $key) {
                return $item['value'];
            }
        }
        return null;
    }

    // Display the hash table
    public function display() {
        echo "Hash Table with Chaining:\n";
        foreach ($this->table as $index => $list) {
            echo "Index $index: ";
            foreach ($list as $item) {
                echo "[Key: {$item['key']}, Value: {$item['value']}] ";
            }
            echo "\n";
        }
    }
}

// Testing the hash table with chaining
$hashTable = new HashTableWithChaining(10);
$hashTable->insert(15, "Apple");
$hashTable->insert(23, "Banana");
$hashTable->insert(37, "Cherry");
$hashTable->insert(42, "Date");
$hashTable->insert(54, "Elderberry");
$hashTable->insert(64, "Fig"); // This will collide with 54 (same hash index)

$hashTable->display();

echo "Finding value for key 42: " . $hashTable->find(42) . "\n"; // Output: Date
echo "Finding value for key 64: " . $hashTable->find(64) . "\n"; // Output: Fig

/**
 * Conclusion:
 * 
 * This script demonstrates:
 * - How to handle collisions in a hash table using chaining.
 * - Insertion of key-value pairs.
 * - Finding a value by key in the hash table.
 */

?>
