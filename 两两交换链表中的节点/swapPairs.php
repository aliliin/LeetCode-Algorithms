<?php

// 两两交换链表中的节点

// 给定 1->2->3->4, 你应该返回 2->1->4->3.



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
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        if ($head == null || $head->next == null) return $head;
        $p1 = $head;
        $p2 = $p1->next;
        $p1->next = $this->swapPairs($p2->next);
        $p2->next = $p1;
        return $p2;
    }
}
