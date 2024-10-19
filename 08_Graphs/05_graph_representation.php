<?php
// 05_graph_representation.php

/**
 * Graph Representation
 * 
 * We represent a graph using an adjacency list where each node points to its neighbors.
 */

class Graph {
    private $adjList;

    public function __construct() {
        $this->adjList = [];
    }

    // Add a vertex to the graph
    public function addVertex($vertex) {
        if (!array_key_exists($vertex, $this->adjList)) {
            $this->adjList[$vertex] = [];
        }
    }

    // Add an edge between two vertices
    public function addEdge($vertex1, $vertex2) {
        if (!array_key_exists($vertex1, $this->adjList)) {
            $this->addVertex($vertex1);
        }
        if (!array_key_exists($vertex2, $this->adjList)) {
            $this->addVertex($vertex2);
        }

        $this->adjList[$vertex1][] = $vertex2;
        $this->adjList[$vertex2][] = $vertex1; // For undirected graph
    }

    // Display the graph
    public function display() {
        foreach ($this->adjList as $vertex => $neighbors) {
            echo "$vertex: " . implode(", ", $neighbors) . "\n";
        }
    }
}

// Testing the graph representation
$graph = new Graph();
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'D');
$graph->addEdge('D', 'E');

echo "Graph Representation (Adjacency List):\n";
$graph->display();

/**
 * Output:
 * A: B, C
 * B: A, D
 * C: A, D
 * D: B, C, E
 * E: D
 */
?>
