<?php
/*
翻转一棵二叉树。
示例：
输入：
4
/   \
2     7
/ \   / \
1   3 6   9
输出：
4
/   \
7     2
/ \   / \
9   6 3   1

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/invert-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    public function invertTree($root)
    {
        if ($root == null) {
            return null;
        }

        $left        = $this->invertTree($root->left);
        $right       = $this->invertTree($root->right);
        $root->right = $left;
        $root->left  = $right;
        return $root;
    }
}
