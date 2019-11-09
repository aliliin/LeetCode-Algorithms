<?php
/**
 * 给定一个二叉树，返回其节点值自底向上的层次遍历。 （即按从叶子节点所在层到根节点所在的层，逐层从左向右遍历）

例如：
给定二叉树 [3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
返回其自底向上的层次遍历为：

[
  [15,7],
  [9,20],
  [3]
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii
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
     * @return Integer[][]
     */
    function levelOrderBottom($root)
    {

        $res = [];
        if (!$root) return $res;
        $queue = [];
        array_push($queue, $root);
        while (!empty($queue)) {
            $list = [];
            foreach ($queue as $v) {
                array_push($list, $v->val);
                if ($v->left != null) {
                    array_push($queue, $v->left);
                }
                if ($v->right != null) {
                    array_push($queue, $v->right);
                }
                array_shift($queue);
            }
            array_unshift($res, $list);
        }
        return $res;
    }

    /**
     * 直接使用层次遍历，然后利用函数反转 数组
     */
    function levelOrderBottom1($root)
    {
        $res = [];
        if (!$root) return $res;
        $queue = [];
        $level = 0;
        array_push($queue, $root);
        while (!empty($queue)) {
            foreach ($queue as $v) {
                if ($v->left != null) {
                    array_push($queue, $v->left);
                }
                if ($v->right != null) {
                    array_push($queue, $v->right);
                }
                $res[$level][] = $v->val;
                array_shift($queue);
            }
            $level++;
        }
        return array_reverse($res);
    }
}