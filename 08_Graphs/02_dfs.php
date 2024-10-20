<?php
// 02_dfs.php

/**
 * Depth First Search (DFS)
 * 
 * DFS explores as far down a branch as possible before backtracking.
 * We implement it using a recursive approach.
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

    // Depth First Search (DFS)
    public function dfs($vertex, &$visited) {
        echo "$vertex ";

        $visited[$vertex] = true;

        foreach ($this->adjList[$vertex] as $neighbor) {
            if (!$visited[$neighbor]) {
                $this->dfs($neighbor, $visited);
            }
        }
    }

    // Start DFS from a given vertex
    public function startDFS($startVertex) {
        $visited = array_fill_keys(array_keys($this->adjList), false);
        $this->dfs($startVertex, $visited);
    }
}

// Testing DFS
$graph = new Graph();
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'D');
$graph->addEdge('D', 'E');

echo "DFS Traversal Starting from Vertex A: ";
$graph->startDFS('A'); // Output: A B D E C

?>
