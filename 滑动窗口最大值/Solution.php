<?php
/**
 * 给定一个数组 nums，有一个大小为 k 的滑动窗口从数组的最左侧移动到数组的最右侧。你只可以看到在滑动窗口内的 k 个数字。滑动窗口每次只向右移动一位。
 * 返回滑动窗口中的最大值。
 *
 * 示例:
 * 输入: nums = [1,3,-1,-3,5,3,6,7], 和 k = 3
 * 输出: [3,3,5,5,6,7]
 * 解释:
 * 滑动窗口的位置                最大值
 * ---------------               -----
 * [1  3  -1] -3  5  3  6  7       3
 * 1 [3  -1  -3] 5  3  6  7       3
 * 1  3 [-1  -3  5] 3  6  7       5
 * 1  3  -1 [-3  5  3] 6  7       5
 * 1  3  -1  -3 [5  3  6] 7       6
 * 1  3  -1  -3  5 [3  6  7]      7
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/sliding-window-maximum
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow1($nums, $k) // 此方案无效
    {
        $length = count($nums);
        if (empty($nums) || $length < $k || $length < 2) return $nums;
        $res[] = $length - $k + 1;
        $link = new SplDoublyLinkedList();
        for ($i = 0; $i < $length; $i++) {
            // 在尾部添加元素，并保证左边元素都比尾部大
            while (!$link->isEmpty() && $nums[$link->top()] <= $nums[$i]) {
                $link->pop();
            }
            $link->push($i);
            //在头部移除元素
            if ($link->bottom() == $i - $k) {
                $link->pop();
            }
            print_r($link);
            print_r($link->bottom());
            //输出结果
            if ($i >= $k - 1) {
                $res[$i - $k + 1] = $nums[$link->bottom()];
            }
        }
        return $res;
    }

    public function maxSlidingWindow($nums, $k)
    {
        if (empty($nums)) return $nums;
        $res = [];
        $window = [];
        foreach ($nums as $key => $num) {
            if ($key >= $k && $window[0] <= $key - $k) {
                array_shift($window);
            }

            while ($window && $nums[end($window)] < $num) {
                array_pop($window);
            }
            $window[] = $key;
            if ($key >= $k - 1) {
                $res[] = $nums[$window[0]];
            }
        }
        return $res;
    }

    public function maxSlidingWindow2($nums, $k)
    {
        $len = count($nums);
        if ($k <= 0 || $k > $len) return [];
        if ($k == 1) return $nums;
        $res = [];
        $window = [];
        for ($i = 0; $i < $len; $i++) {
            //保证temp[0]为最大元素的下标，并且从大到小。如果temp最后的元素比当前的元素小，依次弹出最后的元素，直到满足要求
            while (!empty($window) && $nums[end($window)] <= $nums[$i]) {
                array_pop($window);
            }
            // 添加每一个当前元素的数组下标
            $window[] = $i;
            //保证$window数组里的保存的下标在窗口内，即删除过期元素
            if ($window[0] == $i - $k) {
                array_shift($window);
            }
            //窗口长度为k时再保存当前窗口中的最大值到结果数组$res
            if ($i >= $k - 1) {
                $res[] = $nums[$window[0]];
            }
        }
        return $res;
    }


}




$nums = [1, 3, -1, -3, 5, 3, 6, 7];
//$nums = [1, -1,];
//$nums = [7,2,4];
//$nums = [1,3,1,2,0,5];
$k = 3;
//$k = 1;
$obj = new Solution();
$res = $obj->maxSlidingWindow($nums, $k);
print_r($res);
//  输出: [3,3,5,5,6,7]



