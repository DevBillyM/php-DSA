<?php
// 01_n_queens.php

/**
 * N-Queens Problem
 * 
 * The N-Queens problem is a classic example of backtracking. It places N queens on an N×N chessboard
 * such that no two queens attack each other. This implementation uses backtracking to explore and discard invalid configurations.
 */

function isSafe($board, $row, $col, $n) {
    // Check this row on the left side
    for ($i = 0; $i < $col; $i++) {
        if ($board[$row][$i] == 1) {
            return false;
        }
    }

    // Check the upper diagonal on the left side
    for ($i = $row, $j = $col; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($board[$i][$j] == 1) {
            return false;
        }
    }

    // Check the lower diagonal on the left side
    for ($i = $row, $j = $col; $i < $n && $j >= 0; $i++, $j--) {
        if ($board[$i][$j] == 1) {
            return false;
        }
    }

    return true;
}

function solveNQueensUtil(&$board, $col, $n) {
    if ($col >= $n) {
        return true; // All queens are placed
    }

    for ($i = 0; $i < $n; $i++) {
        if (isSafe($board, $i, $col, $n)) {
            // Place this queen
            $board[$i][$col] = 1;

            // Recur to place the rest of the queens
            if (solveNQueensUtil($board, $col + 1, $n)) {
                return true;
            }

            // Backtrack: remove the queen
            $board[$i][$col] = 0;
        }
    }

    return false;
}

function solveNQueens($n) {
    $board = array_fill(0, $n, array_fill(0, $n, 0));

    if (!solveNQueensUtil($board, 0, $n)) {
        echo "Solution does not exist\n";
        return false;
    }

    // Print the solution
    printSolution($board, $n);
    return true;
}

function printSolution($board, $n) {
    echo "Solution for $n-Queens:\n";
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            echo $board[$i][$j] ? "Q " : ". ";
        }
        echo "\n";
    }
}

// Testing N-Queens Problem
$n = 4;
solveNQueens($n);

/**
 * Output (for 4-Queens):
 * Solution for 4-Queens:
 * . Q . . 
 * . . . Q 
 * Q . . . 
 * . . Q . 
 */

?>
