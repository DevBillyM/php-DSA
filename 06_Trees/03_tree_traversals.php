<?php
// 03_tree_traversals.php

/**
 * Tree Traversals
 * 
 * Traversal methods for a binary tree:
 * - In-order: Left subtree, Root, Right subtree
 * - Pre-order: Root, Left subtree, Right subtree
 * - Post-order: Left subtree, Right subtree, Root
 */

// Node class
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

// Testing Tree Traversals
$tree = new BinaryTree();
$tree->root = new Node(1);
$tree->root->left = new Node(2);
$tree->root->right = new Node(3);
$tree->root->left->left = new Node(4);
$tree->root->left->right = new Node(5);

echo "In-order Traversal: ";
$tree->inOrder($tree->root); // Output: 4 2 5 1 3

echo "\nPre-order Traversal: ";
$tree->preOrder($tree->root); // Output: 1 2 4 5 3

echo "\nPost-order Traversal: ";
$tree->postOrder($tree->root); // Output: 4 5 2 3 1

?>
