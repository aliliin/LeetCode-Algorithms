<?php

// 朋友圈

$Solution = new Solution();
$M = [
    [1, 1, 0],
    [1, 1, 0],
    [0, 0, 1]
];
echo $Solution->findCircleNum($M);
// echo $Solution->findCircleNum1($M);


class Solution
{

    // 并查集
    function findCircleNum($M)
    {
        $len = count($M);
        $unionFind = new UnionFind($len);
        print_r($unionFind);die;
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($M[$i][$j]) {
                    $unionFind->union($i, $j);
                }
            }
        }
        return $unionFind->getCount();
    }

    function findCircleNum1($M)
    {
        $visited = [];
        $count = 0;
        for ($i = 0; $i < count($M); $i++) {
            if ($visited[$i] == 0) {
                $this->dfs($M, $visited, $i);
                $count++;
            }
        }
        return $count;
    }

    function dfs($M, &$visited, $i)
    {
        for ($j = 0; $j < count($M); $j++) {
            if ($M[$i][$j] == 1 && $visited[$j] == 0) {
                $visited[$j] = 1;
                $this->dfs($M, $visited, $j);
            }
        }
    }
}


// UnionFind 并查集 PHP 实现

class UnionFind
{
    private $count = 0;
    private $parent = [];
    public function __construct($size)
    {
        for ($i = 0; $i < $size; $i++) {
            $this->parent[] = $i;
        }
        $this->count = $size;
    }
    public function UnionFind($n)
    {
        $this->count = $n;
    }

    /**
     *  把两个元素合并到一个集合里
     */
    public function union($p, $q)
    {
        $rootP = $this->find($p);
        $rootQ = $this->find($q);
        if ($rootP == $rootQ) return;
        $this->parent[$rootP] = $rootQ;
        $this->count--;
    }

    /**
     * 查找父亲节点 的值
     */
    public function find($p)
    {
        // 从底网上找，所以，找到最后 自身等于自身就是停止条件
        while ($p != $this->parent[$p]) { // 父节点存的是自身。
            $p = $this->parent[$p];
        }
        return $p; //  根的下标

    }
    /**
     *  是否属于同一个集合
     */
    public function isConnected(int $a, int $b): bool
    {
        $aroot = $this->find($a);
        $broot = $this->find($b);
        return $aroot === $broot;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function toString()
    {
        print_r(json_encode((object) $this->parent) . "\n\r");
    }

    /**
     *  并查集元素多少
     */
    public function getSize(): int
    {
        return count($this->parent);
    }
}
