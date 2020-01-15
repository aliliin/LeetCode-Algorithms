<?php

// 实现 Trie (前缀树)


class Node
{
    public $is_end = false;
    public $child = [];
}

class Trie
{
    private $root = null;

    function __construct()
    {
        $this->root = new Node();
    }

    function insert($word)
    {
        $node = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            if (!isset($node->child[$word[$i]])) {
                $node->child[$word[$i]] = new Node();
            }

            $node = $node->child[$word[$i]];
            if ($i == strlen($word) - 1) {
                $node->is_end = true;
            }
        }
    }

    function search($word)
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            if (isset($node->child[$word[$i]])) {
                $node = $node->child[$word[$i]];
            } else {
                return false;
            }
        }

        return $node->is_end;
    }

    function startsWith($prefix)
    {
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            if (isset($node->child[$prefix[$i]])) {
                $node = $node->child[$prefix[$i]];
            } else {
                return false;
            }
        }
        return true;
    }
}


$Trie = new Trie();
$Trie->insert('apple');
$Trie->search("apple");
$Trie->startsWith("apps");
