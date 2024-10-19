<?php
// 02_fibonacci_tabulation.php

/**
 * Fibonacci Sequence using Tabulation
 * 
 * In this approach, we iteratively compute Fibonacci numbers using a bottom-up method,
 * storing intermediate results in an array.
 */

function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    }

    // Initialize the table for Fibonacci numbers
    $fib = array_fill(0, $n + 1, 0);
    $fib[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib[$n];
}

// Testing Fibonacci with Tabulation
echo "Fibonacci(10): " . fibonacci(10) . "\n"; // Output: 55
echo "Fibonacci(20): " . fibonacci(20) . "\n"; // Output: 6765

?>
