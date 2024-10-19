<?php
// 03_bfs.php

/**
 * Breadth First Search (BFS)
 * 
 * BFS explores all neighbors at the current level before moving on to the next level.
 * We implement it using a queue.
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

    // Breadth First Search (BFS)
    public function bfs($startVertex) {
        $visited = array_fill_keys(array_keys($this->adjList), false);
        $queue = [];

        $visited[$startVertex] = true;
        array_push($queue, $startVertex);

        while (count($queue) > 0) {
            $vertex = array_shift($queue);
            echo "$vertex ";

            foreach ($this->adjList[$vertex] as $neighbor) {
                if (!$visited[$neighbor]) {
                    $visited[$neighbor] = true;
                    array_push($queue, $neighbor);
                }
            }
        }
    }
}

// Testing BFS
$graph = new Graph();
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'D');
$graph->addEdge('D', 'E');

echo "BFS Traversal Starting from Vertex A: ";
$graph->bfs('A'); // Output: A B C D E

?>
