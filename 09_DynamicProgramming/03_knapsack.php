<?php
// 03_knapsack.php

/**
 * 0/1 Knapsack Problem
 * 
 * Given weights and values of n items, put these items in a knapsack of capacity W
 * to get the maximum total value in the knapsack.
 * 
 * Dynamic Programming (Bottom-Up Tabulation)
 */

function knapsack($capacity, $weights, $values, $n) {
    // Create a DP table
    $dp = array_fill(0, $n + 1, array_fill(0, $capacity + 1, 0));

    // Build table dp[][] in bottom-up manner
    for ($i = 1; $i <= $n; $i++) {
        for ($w = 1; $w <= $capacity; $w++) {
            if ($weights[$i - 1] <= $w) {
                // Maximize value by either including or excluding the current item
                $dp[$i][$w] = max($values[$i - 1] + $dp[$i - 1][$w - $weights[$i - 1]], $dp[$i - 1][$w]);
            } else {
                $dp[$i][$w] = $dp[$i - 1][$w]; // Exclude item
            }
        }
    }

    // The bottom-right corner contains the maximum value
    return $dp[$n][$capacity];
}

// Testing 0/1 Knapsack Problem
$values = [60, 100, 120];
$weights = [10, 20, 30];
$capacity = 50;
$n = count($values);

echo "Maximum value in Knapsack: " . knapsack($capacity, $weights, $values, $n) . "\n"; // Output: 220

?>
