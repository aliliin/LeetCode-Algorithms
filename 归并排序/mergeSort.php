<?php

function mergesort($array)
{
    $count = count($array);
    $mid = floor($count / 2);
    if ($count < 2) : //递归mergesort直到数组中只有1个元素，交给merge比较大小存入结果集
        return $array;
    endif;
    $right = array_slice($array, 0, $mid); //从0开始往后截取$mid个数值(不包含本身)，返回剩余数组内容
    $left = array_slice($array, $mid);
    return merge(mergesort($left), mergesort($right));
    /*
        return merge(return merge(...),return merge(...))
        1,2,3,4
        1,2 | 3,4
        1 | 2  |  3 | 4
    */
}

function merge($left, $right)
{
    $result = array();
    while (count($left) > 0 && count($right) > 0) { //count函数动态判断数组长度
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left); //左边小于右边，将左边存入结果集，在左边数组删除当前元素
        } else {
            $result[] = array_shift($right);
        }
    }
    while (count($left) > 0) {
        $result[] = array_shift($left);
    }
    while (count($right) > 0) {
        $result[] = array_shift($right);
    }
    return $result; //返回本轮结果集
}

$array = array(2, 4, 1, 7, 714, 492);
$array = mergesort($array);
var_dump($array);
