<?php
/**
 * 给定一个二叉树，判断其是否是一个有效的二叉搜索树。
 * 假设一个二叉搜索树具有如下特征：
 * 节点的左子树只包含小于当前节点的数。
 * 节点的右子树只包含大于当前节点的数。
 * 所有左子树和右子树自身必须也是二叉搜索树。
 * 示例 1:
 * 输入:
 * 2
 * / \
 * 1   3
 * 输出: true
 * 示例 2:
 * 输入:
 * 5
 * / \
 * 1   4
 *      / \
 *     3   6
 * 输出: false
 * 解释: 输入为: [5,1,4,null,null,3,6]。
 *      根节点的值为 5 ，但是其右子节点值为 4 。
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/validate-binary-search-tree
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

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->helper($root, null, null);
    }

    /**
     * @param $root
     * @param $min   下届
     * @param $max   上届
     * @return bool
     */
    function helper($root, $min, $max)
    {
        if ($root == null) return true;
        $val = $root->val;
        if ($min !== null && $val <= $min) return false;
        if ($max !== null && $val >= $max) return false;
        if (!$this->helper($root->left, $min, $val)) return false;
        if (!$this->helper($root->right, $val, $max)) return false;
        return true;
    }

    function isValid($root,$min,$max){
        if ($root == null) return true;
        // 每次的根节点的值
        $val = $root->val;

        if (!empty($min) &&  $val <= $min ) return false;

        if (!empty($max) &&   $val >= $max) return false;

        if (!$this->isValid($root->left,$min,$val)) return false;

        if (!$this->isValid($root->right,$max,$val)) return false;

        return true;
    }
}

// 1.中序遍历 左 + 右
// 2.直接用递归方法（..,min,max）三个值，一个最大值，一个最小值
// 函数题以内 递归 左孩子的最大值，右孩子的最小值，判断 最大值要小于根节点， min 要大于 根节点
