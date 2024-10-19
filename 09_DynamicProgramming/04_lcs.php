<?php
// 04_lcs.php

/**
 * Longest Common Subsequence (LCS)
 * 
 * Given two strings, this algorithm finds the length of the longest subsequence
 * that appears in both strings using dynamic programming.
 */

function lcs($str1, $str2) {
    $m = strlen($str1);
    $n = strlen($str2);

    // Create a DP table
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    // Build the LCS table in a bottom-up manner
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    // The bottom-right corner contains the length of the LCS
    return $dp[$m][$n];
}

// Testing Longest Common Subsequence
$str1 = "AGGTAB";
$str2 = "GXTXAYB";

echo "Length of LCS: " . lcs($str1, $str2) . "\n"; // Output: 4 (LCS is "GTAB")

?>
