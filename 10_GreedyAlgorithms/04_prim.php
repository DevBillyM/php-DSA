<?php
// 04_prim.php

/**
 * Prim's Algorithm for Minimum Spanning Tree (MST)
 * 
 * Prim's algorithm constructs the minimum spanning tree by growing the MST one vertex at a time,
 * always choosing the smallest edge that connects the current MST to a vertex not yet in the MST.
 */

// Prim's Algorithm
function prim($graph, $vertices) {
    $selected = array_fill(0, $vertices, false);
    $selected[0] = true; // Start from vertex 0
    $edges = 0;
    $mstEdges = [];

    while ($edges < $vertices - 1) {
        $min = INF;
        $x = 0;
        $y = 0;

        for ($i = 0; $i < $vertices; $i++) {
            if ($selected[$i]) {
                for ($j = 0; $j < $vertices; $j++) {
                    if (!$selected[$j] && $graph[$i][$j]) {
                        if ($min > $graph[$i][$j]) {
                            $min = $graph[$i][$j];
                            $x = $i;
                            $y = $j;
                        }
                    }
                }
            }
        }

        $mstEdges[] = [$x, $y, $graph[$x][$y]];
        $selected[$y] = true;
        $edges++;
    }

    return $mstEdges;
}

// Testing Prim's Algorithm
$vertices = 5;
$graph = [
    [0, 2, 0, 6, 0],
    [2, 0, 3, 8, 5],
    [0, 3, 0, 0, 7],
    [6, 8, 0, 0, 9],
    [0, 5, 7, 9, 0]
];

$mst = prim($graph, $vertices);

echo "Edges in the Minimum Spanning Tree:\n";
foreach ($mst as $edge) {
    list($u, $v, $weight) = $edge;
    echo "$u - $v (weight: $weight)\n";
}

/**
 * Output:
 * Edges in the Minimum Spanning Tree:
 * 0 - 1 (weight: 2)
 * 1 - 2 (weight: 3)
 * 0 - 3 (weight: 6)
 * 1 - 4 (weight: 5)
 */
?>
