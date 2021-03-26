<?php

// 删除排序链表中的重复元素
/**
 * Definition for a singly-linked list.
 * class ListNode {
 * public $val = 0;
 * public $next = null;
 * function __construct($val = 0, $next = null) {
 * $this->val = $val;
 * $this->next = $next;
 * }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        // 哈希查找表
        $map = []; 
        $cur = $head;
        $prev = null;
        while ($cur != null) {
            if (!isset($map[$cur->val])) { //第一次出现
                $map[$cur->val] = 1;
                $prev = $cur;
                $cur = $cur->next;
            } else { //已经出现过
                $prev->next = $cur->next;
                $cur = $cur->next;
            }
        }
        return $head;
    }
}
