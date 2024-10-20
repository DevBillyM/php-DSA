<?php
// 03_tower_of_hanoi.php

/**
 * Tower of Hanoi using Recursion
 * 
 * The goal is to move all disks from source peg to destination peg using an auxiliary peg.
 * Move n-1 disks to the auxiliary peg, move the nth disk to the destination, then move the n-1 disks to the destination.
 */

function towerOfHanoi($n, $source, $destination, $auxiliary) {
    if ($n == 1) {
        echo "Move disk 1 from $source to $destination\n";
        return;
    }

    // Move top n-1 disks from source to auxiliary
    towerOfHanoi($n - 1, $source, $auxiliary, $destination);

    // Move nth disk from source to destination
    echo "Move disk $n from $source to $destination\n";

    // Move n-1 disks from auxiliary to destination
    towerOfHanoi($n - 1, $auxiliary, $destination, $source);
}

// Testing Tower of Hanoi
$n = 3;  // Number of disks
towerOfHanoi($n, 'A', 'C', 'B');

/**
 * Output for 3 disks:
 * Move disk 1 from A to C
 * Move disk 2 from A to B
 * Move disk 1 from C to B
 * Move disk 3 from A to C
 * Move disk 1 from B to A
 * Move disk 2 from B to C
 * Move disk 1 from A to C
 */

?>
