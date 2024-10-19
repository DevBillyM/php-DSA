<?php
// 01_graph_basics.php

/**
 * Graph Basics
 * 
 * This script introduces basic graph operations, including adding vertices, edges,
 * and displaying the graph structure using an adjacency list.
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

        // Add the edge in both directions for an undirected graph
        $this->adjList[$vertex1][] = $vertex2;
        $this->adjList[$vertex2][] = $vertex1;
    }

    // Display the graph as an adjacency list
    public function display() {
        foreach ($this->adjList as $vertex => $neighbors) {
            echo "$vertex: " . implode(", ", $neighbors) . "\n";
        }
    }
}

// Testing basic graph operations
$graph = new Graph();
$graph->addVertex('A');
$graph->addVertex('B');
$graph->addVertex('C');

$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'C');

echo "Graph Representation (Adjacency List):\n";
$graph->display();

/**
 * Output:
 * Graph Representation (Adjacency List):
 * A: B, C
 * B: A, C
 * C: A, B
 */
?>
