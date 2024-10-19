<?php
// 04_avl_tree.php

/**
 * AVL Tree
 * 
 * AVL Trees are self-balancing binary search trees. They maintain the height balance by performing rotations.
 */

// Node class for AVL Tree
class Node {
    public $data;
    public $left;
    public $right;
    public $height;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->height = 1; // New nodes are initially added at leaf level
    }
}

// AVL Tree class
class AVLTree {
    // Get height of the node
    private function height($node) {
        return $node ? $node->height : 0;
    }

    // Perform a right rotation
    private function rightRotate($y) {
        $x = $y->left;
        $T2 = $x->right;

        // Perform rotation
        $x->right = $y;
        $y->left = $T2;

        // Update heights
        $y->height = max($this->height($y->left), $this->height($y->right)) + 1;
        $x->height = max($this->height($x->left), $this->height($x->right)) + 1;

        // Return new root
        return $x;
    }

    // Perform a left rotation
    private function leftRotate($x) {
        $y = $x->right;
        $T2 = $y->left;

        // Perform rotation
        $y->left = $x;
        $x->right = $T2;

        // Update heights
        $x->height = max($this->height($x->left), $this->height($x->right)) + 1;
        $y->height = max($this->height($y->left), $this->height($y->right)) + 1;

        // Return new root
        return $y;
    }

    // Get balance factor of node
    private function getBalance($node) {
        return $node ? $this->height($node->left) - $this->height($node->right) : 0;
    }

    // Insert a node and balance the tree
    public function insert($node, $data) {
        // 1. Perform normal BST insertion
        if ($node === null) {
            return new Node($data);
        }

        if ($data < $node->data) {
            $node->left = $this->insert($node->left, $data);
        } else if ($data > $node->data) {
            $node->right = $this->insert($node->right, $data);
        } else {
            // Duplicate keys not allowed
            return $node;
        }

        // 2. Update height of this ancestor node
        $node->height = 1 + max($this->height($node->left), $this->height($node->right));

        // 3. Get the balance factor of this ancestor node
        $balance = $this->getBalance($node);

        // 4. If node becomes unbalanced, then there are 4 cases

        // Left Left Case
        if ($balance > 1 && $data < $node->left->data) {
            return $this->rightRotate($node);
        }

        // Right Right Case
        if ($balance < -1 && $data > $node->right->data) {
            return $this->leftRotate($node);
        }

        // Left Right Case
        if ($balance > 1 && $data > $node->left->data) {
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        // Right Left Case
        if ($balance < -1 && $data < $node->right->data) {
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }

        return $node;
    }

    // In-order traversal
    public function inOrder($node) {
        if ($node !== null) {
            $this->inOrder($node->left);
            echo $node->data . " ";
            $this->inOrder($node->right);
        }
    }
}

// Testing AVL Tree
$tree = new AVLTree();
$root = null;

$root = $tree->insert($root, 10);
$root = $tree->insert($root, 20);
$root = $tree->insert($root, 30);
$root = $tree->insert($root, 40);
$root = $tree->insert($root, 50);
$root = $tree->insert($root, 25);

echo "In-order traversal of AVL Tree: ";
$tree->inOrder($root); // Output: 10 20 25 30 40 50

?>
