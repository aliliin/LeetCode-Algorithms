<?php

// 1:暴力求解 O(n^2) 不断的 replace 匹配的括号， 出现过替换为空
//  a.()[]{}
//  b. ((({[]})))
// 2. 用栈来求解 stack

$Solution = new Solution();
$s = "((({[]})))";


var_dump($Solution->isValid($s));

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = new SplStack();
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == "(") {
                $stack->push(')');
            } elseif ($s[$i] == "{") {
                $stack->push('}');
            } elseif ($s[$i] == "[") {
                $stack->push(']');
            } elseif ($stack->isEmpty() || $stack->pop() != $s[$i]) {
                return false;
            }
        }
        return $stack->isEmpty();

    }
}