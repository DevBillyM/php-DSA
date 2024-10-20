<?php
// 02_sudoku_solver.php

/**
 * Sudoku Solver
 * 
 * This implementation solves a Sudoku puzzle using backtracking. The puzzle is represented
 * by a 9×9 grid where empty cells are represented by 0.
 */

function isValid($board, $row, $col, $num) {
    // Check if the number is not in the current row, column, and 3x3 box
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num || $board[$i][$col] == $num || $board[3 * intdiv($row, 3) + intdiv($i, 3)][3 * intdiv($col, 3) + $i % 3] == $num) {
            return false;
        }
    }
    return true;
}

function solveSudoku(&$board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            if ($board[$row][$col] == 0) {  // Empty cell
                for ($num = 1; $num <= 9; $num++) {
                    if (isValid($board, $row, $col, $num)) {
                        $board[$row][$col] = $num;

                        if (solveSudoku($board)) {
                            return true;
                        }

                        // Backtrack: undo the move
                        $board[$row][$col] = 0;
                    }
                }
                return false;  // No valid number found, trigger backtracking
            }
        }
    }
    return true;  // Solved
}

// Function to print the solved Sudoku board
function printSudoku($board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            echo $board[$row][$col] . " ";
        }
        echo "\n";
    }
}

// Testing Sudoku Solver
$board = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0],
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9]
];

if (solveSudoku($board)) {
    echo "Sudoku Solved:\n";
    printSudoku($board);
} else {
    echo "No solution exists.\n";
}

/**
 * Output (solved Sudoku board):
 * 5 3 4 6 7 8 9 1 2 
 * 6 7 2 1 9 5 3 4 8 
 * 1 9 8 3 4 2 5 6 7 
 * 8 5 9 7 6 1 4 2 3 
 * 4 2 6 8 5 3 7 9 1 
 * 7 1 3 9 2 4 8 5 6 
 * 9 6 1 5 3 7 2 8 4 
 * 2 8 7 4 1 9 6 3 5 
 * 3 4 5 2 8 6 1 7 9 
 */
?>
