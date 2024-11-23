<?php

namespace Services;

class VectorArray
{
    private array $values;
    private int $count;
    private string $name = "Динамический массив +1";
    private string $error = "Передан неверный ключ элемента";

    public function __construct(int $size = 1)
    {
        $this->count = $size;
        for ($i = 0; $i < $this->count; $i++) {
            $this->values[$i] = null;
        }
    }

    public function add($value, int $index)
    {
        if (count($this->values) > $this->count) {
            $this->values[$index] = $value;
            $this->count++;
        } else {
            $this->count += 1;
            $this->values = array_pad($this->values, $this->count, null);
            array_splice($this->values, $index, 0, [$value]);
        }
    }

    public function remove(int $index)
    {
        if ($index < 0 || $index > count($this->values)) {
            throw new \Exception($this->error);
        }

        $removedValue = $this->values[$index];
        array_splice($this->values, $index, 1);
        return $removedValue;
    }

    public function getVectorArray() {
        return $this->values;
    }

}