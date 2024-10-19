<?php
// 02_stack_linked_list.php

/**
 * Stack Using Linked List
 * 
 * A stack is a data structure that follows the Last In, First Out (LIFO) principle.
 * 
 * Operations: Push, Pop, Peek
 */

// Node class
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Stack class implemented using a linked list
class LinkedListStack {
    private $top;

    public function __construct() {
        $this->top = null;
    }

    // Push an element onto the stack
    public function push($data) {
        $newNode = new Node($data);
        $newNode->next = $this->top;
        $this->top = $newNode;
    }

    // Pop the top element off the stack
    public function pop() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack underflow: Cannot pop from an empty stack.");
        } else {
            $poppedValue = $this->top->data;
            $this->top = $this->top->next;
            return $poppedValue;
        }
    }

    // Peek the top element without removing it
    public function peek() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty.");
        } else {
            return $this->top->data;
        }
    }

    // Check if the stack is empty
    public function isEmpty() {
        return $this->top === null;
    }

    // Display the stack
    public function display() {
        $current = $this->top;
        echo "Stack: ";
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null\n";
    }
}

// Testing the Linked List Stack
$linkedListStack = new LinkedListStack();
$linkedListStack->push(10);
$linkedListStack->push(20);
$linkedListStack->push(30);

echo "Top element: " . $linkedListStack->peek() . "\n"; // Output: 30
$linkedListStack->display(); // Stack: 30 -> 20 -> 10 -> null

$linkedListStack->pop(); // Removes 30
$linkedListStack->display(); // Stack: 20 -> 10 -> null

/**
 * Conclusion:
 * 
 * This script demonstrates a stack using linked lists with basic operations:
 * - Push: Adds an element to the top of the stack.
 * - Pop: Removes the top element of the stack.
 * - Peek: Returns the top element without removing it.
 */

?>
