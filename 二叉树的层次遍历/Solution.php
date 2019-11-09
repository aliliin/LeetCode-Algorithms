<?php

/**
 * 给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。
 * 例如:
 * 给定二叉树: [3,9,20,null,null,15,7],
 * 3
 * / \
 * 9  20
 * /  \
 * 15   7
 * 返回其层次遍历结果：
 *
 * [
 * [3],
 * [9,20],
 * [15,7]
 * ]
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/binary-tree-level-order-traversal
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
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
    public $res = [];

    /**
     * 双 while 循环
     * 网上的代码解决方案，暂时还不明白
     *
     */
    function levelOrder($root)
    {
        if (!$root) return [];
        $res = [];
        $stack = [0 => [$root]];
        $i = 0;
        while ($stack) {
            while ($node = array_shift($stack[$i])) {
                $res[$i][] = $node->val;
                $node->left && $stack[$i + 1][] = $node->left;
                $node->right && $stack[$i + 1][] = $node->right;
            }
            unset($stack[$i]);
            $i++;
        }
        return $res;
    }
    /**
     *
     * 通过定一个队列的方式，进行循环
     */
    function levelOrder1($root)
    {
        if (!$root) return [];
        $res = [];
        $queue = []; // 定义队列 使用数组
        array_push($queue, $root); // 加入根节点
        $level = 0; // 队列里永远存在的是同一个级别的数据，所以要根据级别进行区分是那一层
        while ($queue) { // 只要队列有值就一只循环
            foreach ($queue as $value) {
                // 它的下一层如果有值的话，就要加入到队列中，
                if ($value->left != null) array_push($queue, $value->left);
                if ($value->right != null) array_push($queue, $value->right);
                // 当前队列中层是有值的，直接就加入进去；
                $res[$level][] = $value->val;
                // 这一层处理完了就要删除掉这一层的值
                array_shift($queue);
            }
            $level++;
        }
        return $res;
    }
}

$Solution = new Solution();
$Solution->levelOrder();