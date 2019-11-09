<?php

/**
 给定一个二叉树，返回它的中序 遍历。

示例:

输入: [1,null,2,3]
   1
    \
     2
    /
   3

输出: [1,3,2]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-inorder-traversal
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */


class Solution
{
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public $res = [];

    /**
     * 中序遍历，是先遍历左，把值加入（根），然后再遍历右
     * 用递归的方式遍历，
     */
    function inorderTraversal($root)
    {
        if ($root != null) {
            $this->inorderTraversal($root->left);
            $this->res[] = $root->val;
            $this->inorderTraversal($root->right);
        }
        return $this->res;
    }
}