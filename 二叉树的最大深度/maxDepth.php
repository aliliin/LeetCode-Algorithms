<?php
/*
给定一个二叉树，找出其最大深度。

二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。

说明: 叶子节点是指没有子节点的节点。

示例：
给定二叉树 [3,9,20,null,null,15,7]，

3
/ \
9  20
/  \
15   7
返回它的最大深度 3 。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/maximum-depth-of-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
// 本地环境输出结果和线上不一样，没有提前定义好对应的 数据格式。
$root = [3, 9, 20, null, null, 15, 7];
print_r(maxDepth($root));
function maxDepth($root)
{
    return $root == null ? 0 : 1 + max(maxDepth($root->left), maxDepth($root->right));
}

die;
