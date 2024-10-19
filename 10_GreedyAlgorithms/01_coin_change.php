<?php
// 01_coin_change.php

/**
 * Coin Change Problem using Greedy Algorithm
 * 
 * Given a set of coin denominations and a target amount, find the minimum number of coins
 * required to make the amount using the largest possible denominations first.
 */

function coinChange($coins, $amount) {
    // Sort coins in descending order
    rsort($coins);

    $coinCount = 0;
    foreach ($coins as $coin) {
        if ($amount == 0) break;

        // Use as many coins of the current denomination as possible
        $coinCount += intdiv($amount, $coin);
        $amount %= $coin;
    }

    return $coinCount;
}

// Testing the Coin Change Problem
$coins = [1, 5, 10, 25];
$amount = 63;

echo "Minimum coins needed: " . coinChange($coins, $amount) . "\n"; // Output: 6 (25 + 25 + 10 + 1 + 1 + 1)

?>
