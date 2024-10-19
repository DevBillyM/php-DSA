<?php
// 03_hashing_open_addressing.php

/**
 * Hashing with Open Addressing
 * 
 * In open addressing, when a collision occurs, the algorithm searches for the next available slot.
 * 
 * Operations: Insert, Find
 */

class HashTableWithOpenAddressing {
    private $table;
    private $size;

    public function __construct($size) {
        $this->size = $size;
        $this->table = array_fill(0, $size, null);
    }

    // Simple hash function
    private function hashFunction($key) {
        return $key % $this->size;
    }

    // Insert key-value pair into hash table
    public function insert($key, $value) {
        $index = $this->hashFunction($key);
        $originalIndex = $index;
        $i = 0;

        // Search for next available slot if collision occurs
        while ($this->table[$index] !== null && $this->table[$index]['key'] !== $key) {
            $i++;
            $index = ($originalIndex + $i) % $this->size;
            if ($i >= $this->size) {
                throw new OverflowException("Hash Table is full.");
            }
        }

        $this->table[$index] = ['key' => $key, 'value' => $value];
        echo "Key $key inserted at index $index\n";
    }

    // Find value by key
    public function find($key) {
        $index = $this->hashFunction($key);
        $originalIndex = $index;
        $i = 0;

        while ($this->table[$index] !== null) {
            if ($this->table[$index]['key'] === $key) {
                return $this->table[$index]['value'];
            }
            $i++;
            $index = ($originalIndex + $i) % $this->size;
            if ($i >= $this->size) {
                return null;
            }
        }
        return null;
    }

    // Display the hash table
    public function display() {
        echo "Hash Table with Open Addressing:\n";
        foreach ($this->table as $index => $item) {
            if ($item !== null) {
                echo "Index $index: [Key: {$item['key']}, Value: {$item['value']}]\n";
            } else {
                echo "Index $index: Empty\n";
            }
        }
    }
}

// Testing the Hash Table with Open Addressing
$hashTable = new HashTableWithOpenAddressing(10);
$hashTable->insert(15, "Apple");
$hashTable->insert(23, "Banana");
$hashTable->insert(37, "Cherry");
$hashTable->insert(42, "Date");
$hashTable->insert(54, "Elderberry");
$hashTable->insert(64, "Fig"); // Causes collision, resolves with open addressing

$hashTable->display();

echo "Finding value for key 42: " . $hashTable->find(42) . "\n"; // Output: Date
echo "Finding value for key 64: " . $hashTable->find(64) . "\n"; // Output: Fig

?>
