<?php
/**
 * 给定一个带有头结点 head 的非空单链表，返回链表的中间结点。
如果有两个中间结点，则返回第二个中间结点。
示例 1：
输入：[1,2,3,4,5]
输出：此列表中的结点 3 (序列化形式：[3,4,5])
返回的结点值为 3 。 (测评系统对该结点序列化表述是 [3,4,5])。
注意，我们返回了一个 ListNode 类型的对象 ans，这样：
ans.val = 3, ans.next.val = 4, ans.next.next.val = 5, 以及 ans.next.next.next = NULL.
示例 2：
输入：[1,2,3,4,5,6]
输出：此列表中的结点 4 (序列化形式：[4,5,6])
由于该列表有两个中间结点，值分别为 3 和 4，我们返回第二个结点。
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/middle-of-the-linked-list
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

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
    public function middleNode($head)
    {
        // 快慢指针： 1.慢指针一次走一步，快指针一次走2步，快指针走到末端，慢指针正好指向中间结点；
        // 2.这里分两种情况：快指针的next为null，慢指针正好指向中间结点，链表结点数为偶数；
        // 快指针为null，慢指针正好指向第二个中间结点，链表结点数为奇数；
        $dummy = $head; // head 的副本
        while ($dummy != null && $dummy->next != null) {
            $dummy = $dummy->next->next; // 快指针
            $head  = $head->next; // 慢指针
        }
        return $head;

    }
}
