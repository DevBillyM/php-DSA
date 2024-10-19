<?php
// 04_dijkstra.php

/**
 * Dijkstra's Algorithm
 * 
 * Dijkstra's Algorithm finds the shortest path in a weighted graph from a source vertex to all other vertices.
 * This implementation uses an adjacency list.
 */

class Graph {
    private $adjList;

    public function __construct() {
        $this->adjList = [];
    }

    // Add an edge with a weight to the graph
    public function addEdge($vertex1, $vertex2, $weight) {
        $this->adjList[$vertex1][] = ['vertex' => $vertex2, 'weight' => $weight];
        $this->adjList[$vertex2][] = ['vertex' => $vertex1, 'weight' => $weight]; // For undirected graph
    }

    // Dijkstra's Algorithm
    public function dijkstra($startVertex) {
        $distances = [];
        $previous = [];
        $priorityQueue = [];

        // Initialize distances and previous vertices
        foreach ($this->adjList as $vertex => $neighbors) {
            $distances[$vertex] = INF;
            $previous[$vertex] = null;
            $priorityQueue[$vertex] = INF;
        }

        $distances[$startVertex] = 0;
        $priorityQueue[$startVertex] = 0;

        while (count($priorityQueue) > 0) {
            // Get the vertex with the smallest distance
            $currentVertex = array_search(min($priorityQueue), $priorityQueue);
            unset($priorityQueue[$currentVertex]);

            foreach ($this->adjList[$currentVertex] as $neighbor) {
                $alt = $distances[$currentVertex] + $neighbor['weight'];
                if ($alt < $distances[$neighbor['vertex']]) {
                    $distances[$neighbor['vertex']] = $alt;
                    $previous[$neighbor['vertex']] = $currentVertex;
                    $priorityQueue[$neighbor['vertex']] = $alt;
                }
            }
        }

        // Display shortest paths from the source
        foreach ($distances as $vertex => $distance) {
            echo "Distance from $startVertex to $vertex is $distance\n";
        }
    }
}

// Testing Dijkstra's Algorithm
$graph = new Graph();
$graph->addEdge('A', 'B', 4);
$graph->addEdge('A', 'C', 1);
$graph->addEdge('C', 'B', 2);
$graph->addEdge('B', 'D', 1);
$graph->addEdge('C', 'D', 5);

echo "Shortest paths from vertex A:\n";
$graph->dijkstra('A');

/**
 * Output:
 * Distance from A to A is 0
 * Distance from A to B is 3
 * Distance from A to C is 1
 * Distance from A to D is 4
 */
?>
