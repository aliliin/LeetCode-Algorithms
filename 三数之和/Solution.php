<?php
/**
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 * 注意：答案中不可以包含重复的三元组。
 * 例如, 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 * 满足要求的三元组集合为：
 * [
 * [-1, 0, 1],
 * [-1, -1, 2]
 * ]
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/3sum
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */


class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $len = count($nums);
        if ($len < 3) {
            return [];
        }
        if ($len == 3) {
            if (array_sum($nums) == 0) {
                return [$nums];
            }
        }
        $res = [];
        sort($nums);
        for ($i = 0; $i < $len - 3; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            $l = $i + 1;
            $r = $len - 1;
            while ($l < $r) {
                $s = $nums[$i] + $nums[$l] + $nums[$r];
                if ($s < 0) {
                    $l += 1;
                } elseif ($s > 0) {
                    $r -= 1;
                } else {
                    $res[] = [$nums[$i], $nums[$l], $nums[$r]];
                    while ($l < $r && $nums[$l] == $nums[$l + 1]) {
                        $l += 1;
                    }
                    while ($l < $r && $nums[$r] == $nums[$r - 1]) {
                        $r -= 1;
                    }
                    $l += 1;
                    $r -= 1;
                }
            }
        }
        return $res;
    }
}

/**
 * @param Integer[] $nums
 * @return Integer[][]
 * 1.将数组排序 2.定义三个指针，i，j，k。遍历i，那么这个问题就可以转化为在i之后的数组中寻找nums[j]+nums[k]=-nums[i]这个问题，也就将三数之和问题转变为二数之和---（可以使用双指针）
 */
class Solution2
{
    function threeSum($nums)
    {
        $len = count($nums);
        if ($len < 3) return [];
        sort($nums);
        $res = [];
        for ($i = 0; $i <= $len - 3; $i++) {
            $j = $i + 1;
            $k = $len - 1;
            while ($j < $k) {
                if ($nums[$i] == ($nums[$j] + $nums[$k]) * -1) {
                    if (!in_array([$nums[$i], $nums[$j], $nums[$k]], $res)) {
                        $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    }
                    $j++;
                    $k--;
                    while ($j < $k && $nums[$j] === $nums[$j - 1]) {
                        $j++;
                    }
                    while ($j < $k && $nums[$k] === $nums[$k + 1]) {
                        $k--;
                    }
                } else {
                    if ($nums[$i] + $nums[$j] + $nums[$k] < 0) {
                        $j++;
                        while ($j < $k && $nums[$j] === $nums[$j - 1]) {
                            $j++;
                        }
                    } else {
                        $k--;
                        while ($j < $k && $nums[$k] === $nums[$k + 1]) {
                            $k--;
                        }
                    }
                }

            }

        }
        return $res;
    }
}

$obj = new Solution();
$nums = [-1, 0, 1, 2, -1, -4];
$nums = [0, 0, 0];

print_r($obj->threeSum($nums));
