<?php

namespace Services;

class SingleArray
{
    protected int $count;
    protected array $values;
    protected string $name = "Фиксированный массив";

    public function __construct(int $size = 1)
    {
        $this->count = 0;
        $this->values = [];
        for ($i = 0; $i < $size; $i++) {
            $this->values[$i] = null;
        }
    }

    public function add($value)
    {
        $this->values[$this->count] = $value;
        $this->count++;

    }

    public function remove(int $index)
    {
        if (isset($this->values[$index])) {
            $removedNum = $this->values[$index];
            for ($i = $index; $i < $this->count - 1; $i++) {
                $this->values[$i] = $this->values[$i + 1];
            }
            unset($this->values[$this->count - 1]);
            $this->count--;

            return $removedNum;

        }
    }

    public function get(int $index) {
        return $this->values[$index];
    }

    public function set(int $index, $value)
    {
        if (isset($this->values[$index])) {
            $this->values[$index] = $value;
        } else {
            throw new \Exception("Элемента с ключом" . $index . "не существует");
        }

    }

    public function getSingleArray() {
        return $this->values;
    }



}