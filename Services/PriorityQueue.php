<?php

namespace Services;

class PriorityQueue
{
    private array $queue = [];
    private array $priorities = [];

    private int $count;

    public function __construct($size = 100)
    {
        $this->queue = array_fill(0, $size, null);
        $this->priorities = $this->queue = array_fill(0, $size, null);
        $this->count = 0;
    }

    public function enqueue($priority, $item)
    {
        $this->queue[$this->count] = $item;
        $this->priorities[$this->count] = $priority;
        $this->count++;
    }

    private function sort()
    {
        for ($i = 0; $i < $this->count - 1; $i++)
        {
            for ($j = $i+1; $j < $this->count; $j++)
            {
                if ($this->priorities[$j] < $this->priorities[$i]) {
                    $temp = $this->priorities[$i];
                    $this->priorities[$i] = $this->priorities[$j];
                    $this->priorities[$j] = $temp;
                    $val = $this->queue[$i];
                    $this->queue[$i] = $this->queue[$j];
                    $this->queue[$j] = $val;
                }
            }
        }
    }

    public function dequeue()
    {
        $this->sort();
        $item = $this->queue[0];
        for ($i = 1; $i < $this->count; $i++) {
            $this->queue[$i - 1] = $this->queue[$i];
        }
        $this->count--;
        return $item;
    }

}