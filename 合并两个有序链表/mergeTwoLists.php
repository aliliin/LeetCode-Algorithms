<?php


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * 递归的方式
     * 我们直接将以上递归过程建模，首先考虑边界情况。
     * 特殊的，如果 l1 或者 l2 一开始就是 null ，那么没有任何操作需要合并，所以我们只需要返回非空链表。
     * 否则，我们要判断 l1 和 l2 哪一个的头元素更小，然后递归地决定下一个添加到结果里的值。
     * 如果两个链表都是空的，那么过程终止，所以递归过程最终一定会终止
     */
    function mergeTwoLists($l1, $l2)
    {
        if ($l1 == null) {
            return $l2;
        } else if ($l2 == null) {
            return $l1;
        } else if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }

    function mergeTwoLists1($l1,$l2)
    {
        $prehead = new ListNode(-1);
        $prev = $prehead;
        while ($l1 != null && $l2 != null) {
            if ($l1->val <= $l2->val) {
                $prev->next = $l1;
                $l1 = $l1->next;
            } else {
                $prev->next = $l2;
                $l2 = $l2->next;
            }
            $prev = $prev->next;
        }
        $prev->next = $l1 == null ? $l2 : $l1;
        return $prehead->next;

    }

    function b($l1, $l2)
    {
        if ($l1 != null && $l2 != null) {
            if ($l1->val > $l2->val) {
                $temp = $l1;
                $l1 = $l2;
                $l2 = $temp;
            }
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
        }
        return $l1 or $l2;

    }
}