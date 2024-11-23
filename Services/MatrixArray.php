<?php

namespace Services;

class MatrixArray
{
    const SIZE = 10;
    protected $count = 0;
    protected $values = [];
    public $realloc = 0;
    public $name = "Свободный массив";

    public function __construct() {
        $this->count = 0;
        $this->values = [[]];
        $this->values[0] = array_fill(0, self::SIZE, null);
    }

    public function offsetGet($index) {
        return $this->values[intval($index / self::SIZE)][$index % self::SIZE];
    }

    public function offsetSet($index, $value) {
        $this->values[intval($index / self::SIZE)][$index % self::SIZE] = $value;
    }

    public function put($value) {
        $row = intdiv($this->count, self::SIZE);
        $col = $this->count % self::SIZE;

        if ($row < count($this->values)) {
            $this->values[$row][$col] = $value;
            $this->count++;
        } else {
            $this->realloc++;
            $this->values[$row] = array_fill(0, self::SIZE, null);
            $this->values[$row][$col] = $value;
            $this->count++;
        }
    }

    public function add($value, $index) {
        // Ensure the index is valid
        if ($index >= $this->count) {
            $this->put($value);
            return;
        }

        $row = intdiv($index, self::SIZE);
        $col = $index % self::SIZE;

        if ($row < count($this->values)) {
            $this->values[$row][$col] = $value;
            $this->count++;
        } else {
            $this->realloc++;
            $this->values[$row] = array_fill(0, self::SIZE, null);
            $this->values[$row][$col] = $value;
            $this->count++;
        }
    }

    public function remove($index) {
        $row = intdiv($index, self::SIZE);
        $col = $index % self::SIZE;

        if (isset($this->values[$row][$col])) {
            $removedValue = $this->values[$row][$col];
            array_splice($this->values[$row], $col, 1);
            $countCol = count($this->values[$row]);
            $this->values[$row][$countCol] = null;
            $this->count--;
            return $removedValue;
        }
        return null;
    }

        public function getMatrixArray() {
        return $this->values;
    }
}