<?php
// 03_kruskal.php

/**
 * Kruskal's Algorithm for Minimum Spanning Tree (MST)
 * 
 * Kruskal's algorithm finds the minimum spanning tree in a weighted undirected graph
 * by selecting the smallest edges while avoiding cycles.
 */

// Union-Find data structure to detect cycles
class UnionFind {
    private $parent;

    public function __construct($n) {
        $this->parent = range(0, $n - 1);
    }

    // Find the root of a node
    public function find($i) {
        if ($this->parent[$i] == $i) {
            return $i;
        }
        return $this->parent[$i] = $this->find($this->parent[$i]);
    }

    // Union two subsets
    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX != $rootY) {
            $this->parent[$rootX] = $rootY;
        }
    }
}

// Kruskal's Algorithm
function kruskal($vertices, $edges) {
    $mst = [];
    $uf = new UnionFind($vertices);

    // Sort edges by weight
    usort($edges, function ($a, $b) {
        return $a[2] - $b[2];
    });

    foreach ($edges as $edge) {
        list($u, $v, $weight) = $edge;

        // Check if u and v are in different subsets
        if ($uf->find($u) != $uf->find($v)) {
            $mst[] = $edge;
            $uf->union($u, $v);
        }
    }

    return $mst;
}

// Testing Kruskal's Algorithm
$vertices = 4;
$edges = [
    [0, 1, 10],
    [0, 2, 6],
    [0, 3, 5],
    [1, 3, 15],
    [2, 3, 4]
];

$mst = kruskal($vertices, $edges);

echo "Edges in the Minimum Spanning Tree:\n";
foreach ($mst as $edge) {
    list($u, $v, $weight) = $edge;
    echo "$u - $v (weight: $weight)\n";
}

/**
 * Output:
 * Edges in the Minimum Spanning Tree:
 * 2 - 3 (weight: 4)
 * 0 - 3 (weight: 5)
 * 0 - 1 (weight: 10)
 */

?>
