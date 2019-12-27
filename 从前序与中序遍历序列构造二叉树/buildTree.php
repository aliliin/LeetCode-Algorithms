<?php

/**
 * Definition for a binary tree node.*/

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}

class Solution
{

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    private $preorder;
    private $inorder;

    function buildTree($preorder, $inorder)
    {
        return $this->helper($preorder, 0, count($preorder) - 1, $inorder, 0, count($inorder) - 1);
    }

    function helper($preorder, $pStart, $pEnd, $inorder, $iStart, $iEnd)
    {
        if ($pStart > $pEnd || $iStart > $iEnd) {
            return null;
        }
        $root = new TreeNode($preorder[$pStart]);// 根结点的值
        $key = array_search($root->val, $inorder); //
        $leftLength = $key - $iStart; // 左子树的长度
        $preStRight = $pStart + $leftLength + 1;
        $preStLeft = $pStart + 1;
        $root->left = $this->helper($preorder, $preStLeft, $pStart + $leftLength, $inorder, $iStart, $key - 1);
        $root->right = $this->helper($preorder, $preStRight, $pEnd, $inorder, $key + 1, $iEnd);
        return $root;

    }
}

$Solution =new Solution();
$preorder = [3,9,20,15,7];
$inorder = [9,3,15,20,7];
var_dump($Solution->buildTree($preorder,$inorder));