<?php
// 02_binary_search_tree.php

/**
 * Binary Search Tree (BST)
 * 
 * A BST is a binary tree where the left subtree contains only nodes with values less than the root,
 * and the right subtree contains only nodes with values greater than the root.
 */

// Node class for a BST
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

// Binary Search Tree class
class BinarySearchTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    // Insert a node into the BST
    public function insert($data) {
        $newNode = new Node($data);

        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    // Helper function to insert a node
    private function insertNode($node, $newNode) {
        if ($newNode->data < $node->data) {
            if ($node->left === null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if ($node->right === null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    // In-order traversal (Left, Root, Right)
    public function inOrder($node) {
        if ($node !== null) {
            $this->inOrder($node->left);
            echo $node->data . " ";
            $this->inOrder($node->right);
        }
    }
}

// Testing Binary Search Tree
$bst = new BinarySearchTree();
$bst->insert(50);
$bst->insert(30);
$bst->insert(70);
$bst->insert(20);
$bst->insert(40);
$bst->insert(60);
$bst->insert(80);

// In-order Traversal of BST
echo "In-order Traversal: ";
$bst->inOrder($bst->root); // Output: 20 30 40 50 60 70 80

?>
