<?php
// 01_factorial.php

/**
 * Factorial using Recursion
 * 
 * Factorial of n is the product of all positive integers less than or equal to n.
 * Factorial(n) = n * Factorial(n-1)
 * Base Case: Factorial(0) = 1
 */

function factorial($n) {
    if ($n <= 1) {
        return 1; // Base case
    }
    return $n * factorial($n - 1); // Recursive case
}

// Testing Factorial
$n = 5;
echo "Factorial of $n is: " . factorial($n) . "\n"; // Output: 120

?>
