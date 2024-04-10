<?php

/**
 * Given a binary tree, find the maximum depth
 * The maximum depth is the number of nodes along the longest path from the root
 *  down to the farthest path to the leaf node.
 * Note: A leaf is node with no children.
 * 
 * Example: 
 * given binary tree = [3, 9, 20, null, null, 15, 7]
 * 3
 * /\
 * 9 20
 * /\
 * 15 17 
 * 
 * return its depth = 3.
 */

/**
 * 
 * @param {TreeNode} $root 
 * @returns int
 */
// function maxDepth($root) {
//     return -1;
// }


class TreeNode {
    public $val;
    public $left;
    public $right;

    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function maxDepth($root) {
    // Base case: if the root is null, return 0
    if ($root === null) {
        return 0;
    }
    
    // Recursively find the maximum depth of the left and right subtrees
    $leftDepth = maxDepth($root->left);
    $rightDepth = maxDepth($root->right);
    
    // Return the maximum depth among the left and right subtrees plus 1 (for the current node)
    return max($leftDepth, $rightDepth) + 1;
}

// Example usage:
$tree = new TreeNode(3);
$tree->left = new TreeNode(9);
$tree->right = new TreeNode(20);
$tree->right->left = new TreeNode(15);
$tree->right->right = new TreeNode(7);

echo maxDepth($tree); // Output: 3

