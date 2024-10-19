<?php
// 02_minimum_spanning_tree.php

/**
 * Minimum Spanning Tree (MST) Basics
 * 
 * A Minimum Spanning Tree (MST) of a graph is a subset of the edges that connects all vertices together
 * without cycles and with the minimum possible total edge weight.
 */

class Edge {
    public $src, $dest, $weight;

    public function __construct($src, $dest, $weight) {
        $this->src = $src;
        $this->dest = $dest;
        $this->weight = $weight;
    }
}

class Graph {
    private $vertices;
    private $edges;

    public function __construct($vertices) {
        $this->vertices = $vertices;
        $this->edges = [];
    }

    // Add an edge to the graph
    public function addEdge($src, $dest, $weight) {
        $this->edges[] = new Edge($src, $dest, $weight);
    }

    // Function to display edges in the MST
    public function displayMST($mst) {
        echo "Edges in the Minimum Spanning Tree:\n";
        foreach ($mst as $edge) {
            echo "{$edge->src} - {$edge->dest} (weight: {$edge->weight})\n";
        }
    }

    // Helper function to introduce MST algorithms
    public function explainMST() {
        echo "A Minimum Spanning Tree (MST) is a subset of the edges of a graph that:\n";
        echo "- Connects all vertices without cycles.\n";
        echo "- Minimizes the total edge weight.\n";
        echo "Common MST algorithms include Kruskal's and Prim's algorithms.\n";
    }
}

// Testing Minimum Spanning Tree Concept
$graph = new Graph(4);
$graph->addEdge(0, 1, 10);
$graph->addEdge(0, 2, 6);
$graph->addEdge(0, 3, 5);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 4);

$graph->explainMST();

/**
 * Output:
 * A Minimum Spanning Tree (MST) is a subset of the edges of a graph that:
 * - Connects all vertices without cycles.
 * - Minimizes the total edge weight.
 * Common MST algorithms include Kruskal's and Prim's algorithms.
 */
?>
