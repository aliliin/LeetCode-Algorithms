<?php
$solution = new Solution();
$heights = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];
// 输出: 6
var_dump($solution->trap($heights));
var_dump($solution->trap1($heights));

class Solution
{

    /**
     *     栈的应用
     */
    function trap($height)
    {

        $current = $ans = 0;
        $stack = new SplStack();
        while ($current < count($height)) {
            while (!$stack->isEmpty() && $height[$current] > $height[$stack->top()]) {
                // 意味着栈中元素可以被弹出。弹出栈顶元素 top
                $top = $stack->top();
                $stack->pop();
                if ($stack->isEmpty()) {
                    break;
                }
                // 计算当前元素和栈顶元素的距离，准备进行填充操作
                $distance = $current - $stack->top() - 1;
                // 找出界定高度
                $bundedHeight = min($height[$current], $height[$stack->top()]) - $height[$top];
                // 往答案中累加积水量
                $ans += $distance * $bundedHeight;
            }
            // 将当前索引下标入栈
            // 将 current 移动到下个位置
            $stack->push($current++);
        }
        return $ans;
    }

    // 数组双指针
    function trap1($height)
    {
        $len = count($height);
        $left = 0;
        $right = $len - 1;
        $leftMax = $rightMax = 0;
        $ans = 0;
        while ($left < $right) {
            if ($height[$left] < $height[$right]) {
                $height[$left] >= $leftMax ? ($leftMax = $height[$left]) : $ans += ($leftMax - $height[$left]);
                $left++;
            } else {
                $height[$right] >= $rightMax ? ($rightMax = $height[$right]) : $ans += ($rightMax - $height[$right]);
                $right--;
            }
        }
        return $ans;

    }
}