<?php


class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    private $num = 0;
    private $grid = [];

    function numIslands($grid)
    {
        $this->grid = $grid;
        foreach ($this->grid as $key => $value) {
            foreach ($value as $k => $item) {
                if ($this->grid[$key][$k] == 1) {
                    $this->num++;
                    $this->dfs($key, $k);
                }
            }
        }
        return $this->num;
    }

    function dfs($key, $k)
    {
        if (!isset($this->grid[$key][$k]) || $this->grid[$key][$k] != 1) return;
        $this->grid[$key][$k] = 0;
        $this->dfs($key + 1, $k);
        $this->dfs($key - 1, $k);
        $this->dfs($key, $k + 1);
        $this->dfs($key, $k - 1);
    }


    function _grid(&$grid, $row, $cols, $i, $j)
    {
        if ($i >= $row || $j >= $cols || $i < 0 || $j < 0)
            return;
        if ($grid[$i][$j] == "1") {
            $grid[$i][$j] = '0';
            $this->_grid($grid, $row, $cols, $i, $j - 1);
            $this->_grid($grid, $row, $cols, $i, $j + 1);
            $this->_grid($grid, $row, $cols, $i - 1, $j);
            $this->_grid($grid, $row, $cols, $i + 1, $j);
        }
    }
}

$Solution = new Solution();
$grid = [["1", "1", "1", "1", "0"], ["1", "1", "0", "1", "0"], ["1", "1", "0", "0", "0"], ["0", "0", "0", "0", "0"]];
echo $Solution->numIslands($grid);





