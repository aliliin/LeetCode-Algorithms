<?php


class Solution
{

    /**
     * 递归 (超出内存限制)
     */
    public $triangle = [];
    public $path=[];
    function minimumTotal1($triangle)
    {
        $this->triangle = $triangle;
        $this->helper(0, 0, 0);
        var_dump($this->path);
        return min($this->path);
    }

    function helper($i, $j, $res)
    {
        if ($i >= count($this->triangle)) {
            array_push($this->path, $res);
            return ;
        }

        $res += $this->triangle[$i][$j];
        $this->helper($i + 1, $j, $res);
        $this->helper($i + 1, $j + 1, $res);
    }

    /**
     * DP （从下往上进行递推）
     * 1.状态的定义 DP[i,j] :低 走到 i，j 的各个路径的和 的最小值
     * 2.定义方程 DP[i,j] = min(dp[i+1,j],dp[i+1,j+1]) + triangle[i,j]
     *  最后一行 dp[m-1,j] = triangle[m-1,j]
     */
    function minimumTotal($triangle)
    {
        for ($i = count($triangle) - 2; $i >= 0; $i--) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $triangle[$i][$j] = min($triangle[$i + 1][$j], $triangle[$i + 1][$j + 1]) + $triangle[$i][$j];
            }
        }
        return $triangle[0][0];
    }

}

$solution = new Solution();
$triangle = [[2], [3, 4], [6, 5, 7], [4, 1, 8, 3]];

$triangle = [[-1], [2, 3], [1, -1, -3]];
$triangle = [[2], [3, 4], [6, 5, 4], [3, 2, 2, 1]];
//echo $solution->minimumTotal($triangle);
echo $solution->minimumTotal1($triangle);