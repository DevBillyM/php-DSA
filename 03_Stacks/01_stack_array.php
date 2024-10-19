<?php
// 01_stack_array.php

/**
 * Stack Using Arrays
 * 
 * A stack is a data structure that follows the Last In, First Out (LIFO) principle.
 * 
 * Operations: Push, Pop, Peek
 */

class Stack {
    private $stack;
    private $limit;

    public function __construct($limit = 10) {
        $this->stack = [];
        $this->limit = $limit;
    }

    // Push an element onto the stack
    public function push($item) {
        if (count($this->stack) < $this->limit) {
            array_push($this->stack, $item);
        } else {
            throw new OverflowException("Stack overflow: Cannot add more items.");
        }
    }

    // Pop the top element off the stack
    public function pop() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack underflow: Cannot pop from an empty stack.");
        } else {
            return array_pop($this->stack);
        }
    }

    // Peek the top element without removing it
    public function peek() {
        return end($this->stack);
    }

    // Check if the stack is empty
    public function isEmpty() {
        return empty($this->stack);
    }

    // Display the stack
    public function display() {
        echo "Stack: ";
        print_r($this->stack);
    }
}

// Testing the Stack
$stack = new Stack(5);
$stack->push(10);
$stack->push(20);
$stack->push(30);

echo "Top element: " . $stack->peek() . "\n"; // Output: 30
$stack->display(); // Stack: [10, 20, 30]

$stack->pop(); // Removes 30
$stack->display(); // Stack: [10, 20]

/**
 * Conclusion:
 * 
 * This script demonstrates a stack using arrays with basic operations:
 * - Push: Adds an element to the top of the stack.
 * - Pop: Removes the top element of the stack.
 * - Peek: Returns the top element without removing it.
 */

?>
