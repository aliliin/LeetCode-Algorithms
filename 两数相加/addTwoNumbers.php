<?php

$l1 = [2, 4, 3];
$l2 = [5, 6, 4];
// 输出：[7,0,8]
//解释：342 + 465 = 807.
var_dump(addTwoNumbers($l1, $l2));

function addTwoNumbers($l1, $l2)
{
    $obj = null;

    $additional = 0;
    do {
        $value = $l1->val + $l2->val + $additional;
        if ($value < 10) {
            $additional = 0;
        } else {
            $value -= 10;
            $additional = 1;
        }

        $tmp_obj = new ListNode($value);

        if (is_null($obj)) {
            $obj = $tmp_obj;
        } else {
            $next->next = $tmp_obj;
        }
        $next = $tmp_obj;

        $l1 = $l1->next;
        $l2 = $l2->next;
    } while ($l1 || $l2 || $additional);

    return $obj;
}


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */