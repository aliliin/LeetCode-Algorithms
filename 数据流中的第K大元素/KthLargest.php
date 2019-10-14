<?php
/**
 * 设计一个找到数据流中第K大元素的类（class）。注意是排序后的第K大元素，不是第K个不同的元素。
 *
 * 你的 KthLargest 类需要一个同时接收整数 k 和整数数组nums 的构造器，它包含数据流中的初始元素。每次调用 KthLargest.add，返回当前数据流中第K大的元素。
 * 示例:
 * int k = 3;
 * int[] arr = [4,5,8,2];
 * KthLargest kthLargest = new KthLargest(3, arr);
 * kthLargest.add(3);   // returns 4
 * kthLargest.add(5);   // returns 5
 * kthLargest.add(10);  // returns 5
 * kthLargest.add(9);   // returns 8
 * kthLargest.add(4);   // returns 8
 * 说明:
 * 你可以假设 nums 的长度≥ k-1 且k ≥ 1。
 */

// PHP实现：用SPL 库内置的 SplPriorityQueue优先队列
class MySplPriorityQueue extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) return 0;
        return $priority1 < $priority2 ? 1 : -1;
    }
}

class KthLargest
{
    private $k = null;
    private $nums = null;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums)
    {
        $this->k = $k;
        $this->nums = $nums;
        rsort($this->nums);
        $this->nums = array_slice($this->nums, 0, $k);
        $splPriorityQueue = new \MySplPriorityQueue();
        foreach ($this->nums as $k => $num) {
            $splPriorityQueue->insert($num, $num);
        }
        $this->nums = $splPriorityQueue;
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        if ($this->nums->count() < $this->k) {
            $this->nums->insert($val, $val);
        } elseif ($val > $this->nums->top()) {
            $this->nums->extract();
            $this->nums->insert($val, $val);
        }
        return $this->nums->top();
    }
}


$k = 3;
$nums = [4, 5, 8, 2];


//["KthLargest","add","add","add","add","add"]
//[[1,[]],[-3],[-2],[-4],[0],[4]]
//[null,-3,-2,-2,0,4]


$obj = new KthLargest($k, $nums);
$val = 10;
$ret_1 = $obj->add($val);
var_dump($ret_1);