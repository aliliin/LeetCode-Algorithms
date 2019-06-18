<?php

/**
输入:
Tree 1                     Tree 2
1                         2
/ \                       / \
3   2                     1   3
/                           \   \
5                             4   7
输出:
合并后的树:
3
/ \
4   5
/ \   \
5   4   7

 */
function mergeTrees($t1, $t2)
{
    if ($t1 != null && $t2 != null) {
        $t1->val += $t2->val;
        $t1->left  = $this->mergeTrees($t1->left, $t2->left);
        $t1->right = $this->mergeTrees($t1->right, $t2->right);
    }
    return $t1 == null ? $t2 : $t1;
}
