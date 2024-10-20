<?php
// 02_fibonacci.php

/**
 * Fibonacci Sequence using Recursion
 * 
 * Fibonacci(n) = Fibonacci(n-1) + Fibonacci(n-2)
 * Base Cases: Fibonacci(0) = 0, Fibonacci(1) = 1
 */

function fibonacci($n) {
    if ($n <= 1) {
        return $n; // Base cases
    }
    return fibonacci($n - 1) + fibonacci($n - 2); // Recursive case
}

// Testing Fibonacci Sequence
$n = 10;
echo "Fibonacci($n) is: " . fibonacci($n) . "\n"; // Output: 55

?>
