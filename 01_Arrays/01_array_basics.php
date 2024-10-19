<?php
// 01_array_basics.php

/**
 * Introduction to arrays in PHP
 * 
 * Arrays are one of the most commonly used data structures in PHP.
 * They allow you to store multiple values in a single variable.
 * This script covers the basics: creating, accessing, and modifying arrays.
 */

// Creating a simple array
$fruits = ["Apple", "Banana", "Orange"];

// Accessing array elements
echo "First fruit: " . $fruits[0] . "\n"; // Output: Apple
echo "Second fruit: " . $fruits[1] . "\n"; // Output: Banana

// Adding a new element to the array
$fruits[] = "Grapes";
echo "Added new fruit: " . $fruits[3] . "\n"; // Output: Grapes

// Modifying an array element
$fruits[1] = "Mango"; // Changing 'Banana' to 'Mango'
echo "Updated second fruit: " . $fruits[1] . "\n"; // Output: Mango

// Looping through an array using foreach
echo "List of fruits: \n";
foreach ($fruits as $fruit) {
    echo $fruit . "\n";
}

// Associative arrays (key => value pairs)
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "Glasgow"
];

// Accessing elements of an associative array
echo "Name: " . $person["name"] . "\n"; // Output: John
echo "Age: " . $person["age"] . "\n";   // Output: 30

// Adding a new key-value pair
$person["occupation"] = "Developer";
echo "Occupation: " . $person["occupation"] . "\n"; // Output: Developer

// Looping through an associative array
//ucfirst() PHP function that converts the first character of a string to uppercase.
echo "Person Details:\n";
foreach ($person as $key => $value) {
    echo ucfirst($key) . ": " . $value . "\n";
}

/**
 * Conclusion:
 * 
 * This script introduces basic array operations:
 * - Creating indexed arrays and associative arrays.
 * - Accessing, modifying, and adding elements.
 * - Looping through arrays using the foreach loop.
 */

?>