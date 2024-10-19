<?php
// 01_binary_tree.php

/**
 * Binary Tree Node
 * 
 * A basic binary tree where each node contains a value and references to left and right children.
 */

// Node class for a binary tree
class Node {
    public $data;
    public $left;
    public $right;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

// Binary Tree class
class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    // In-order traversal (Left, Root, Right)
    public function inOrder($node) {
        if ($node !== null) {
            $this->inOrder($node->left);
            echo $node->data . " ";
            $this->inOrder($node->right);
        }
    }

    // Pre-order traversal (Root, Left, Right)
    public function preOrder($node) {
        if ($node !== null) {
            echo $node->data . " ";
            $this->preOrder($node->left);
            $this->preOrder($node->right);
        }
    }

    // Post-order traversal (Left, Right, Root)
    public function postOrder($node) {
        if ($node !== null) {
            $this->postOrder($node->left);
            $this->postOrder($node->right);
            echo $node->data . " ";
        }
    }
}

// Testing Binary Tree
$tree = new BinaryTree();
$tree->root = new Node(1);
$tree->root->left = new Node(2);
$tree->root->right = new Node(3);
$tree->root->left->left = new Node(4);
$tree->root->left->right = new Node(5);

// Traversals
echo "In-order Traversal: ";
$tree->inOrder($tree->root); // Output: 4 2 5 1 3

echo "\nPre-order Traversal: ";
$tree->preOrder($tree->root); // Output: 1 2 4 5 3

echo "\nPost-order Traversal: ";
$tree->postOrder($tree->root); // Output: 4 5 2 3 1

?>
