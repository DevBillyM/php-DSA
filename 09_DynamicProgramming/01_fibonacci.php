<?php
// 01_fibonacci_memoization.php

/**
 * Fibonacci Sequence using Memoization
 * 
 * In this approach, we recursively compute Fibonacci numbers and store intermediate results to avoid redundant computations.
 */

// Initialize the cache (memoization)
function fibonacci($n, &$cache = []) {
    if ($n <= 1) {
        return $n;
    }

    // Check if the result is already cached
    if (isset($cache[$n])) {
        return $cache[$n];
    }

    // Compute and cache the result
    $cache[$n] = fibonacci($n - 1, $cache) + fibonacci($n - 2, $cache);

    return $cache[$n];
}

// Testing Fibonacci with Memoization
echo "Fibonacci(10): " . fibonacci(10) . "\n"; // Output: 55
echo "Fibonacci(20): " . fibonacci(20) . "\n"; // Output: 6765

?>
