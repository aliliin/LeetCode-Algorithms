<?php

class MinStack
{
    // 主栈
    private $stack;

    // 辅助栈
    private $helper;

    // 主栈元素个数
    private $len;

    // 辅助栈元素个数
    private $h_len;

    function __construct()
    {
        $this->stack = [];
        $this->helper = [];
        $this->len = 0;
        $this->h_len = 0;
    }

    function push($x)
    {
        $this->stack[] = $x;
        $this->len++;
        if (empty($this->helper) || $this->helper[$this->h_len - 1] >= $x) {
            // 辅助栈为空，或辅助栈的栈顶元素大于等于入栈元素
            $this->helper[] = $x;
            $this->h_len++;
        } else {
            // 辅助栈不为空，入栈元素不小于主栈栈顶元素，将辅栈栈顶元素再次入栈
            $this->helper[] = $this->helper[$this->h_len - 1];
            $this->h_len++;
        }
    }

    /**
     * @return NULL
     */
    function pop()
    {
        if ($this->len > 0) {
            array_pop($this->stack);
            array_pop($this->helper);
            $this->len--;
            $this->h_len--;
            return true;
        }
        throw new Exception('栈中元素为空，操作非法');
    }

    function top()
    {
        if ($this->len > 0) {
            return $this->stack[$this->len - 1];
        }
        throw new Exception('栈中元素为空，操作非法');
    }

    /**
     * 时间复杂度 O(1)
     * 空间复杂度 O(1)
     */
    function getMin()
    {
        if ($this->h_len > 0) {
            return $this->helper[$this->h_len - 1];
        }
        throw new Exception('栈中元素为空，操作非法');
    }


}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
class MinStack1
{
    /**
     * initialize your data structure here.
     */
    function __construct()
    {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {

    }

    /**
     * @return NULL
     */
    function pop()
    {

    }

    /**
     * @return Integer
     */
    function top()
    {

    }

    /**
     * @return Integer
     */
    function getMin()
    {

    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */