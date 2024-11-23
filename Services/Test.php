<?php

namespace Services;

class Test
{
    public function test($arrayType, $arrayParams, $operations) {
        echo "Тест для массива: " . $arrayType . PHP_EOL;
        $results = [];

        foreach ($operations as $operation) {
            $start = microtime(true);

            if ($operation['type'] == 'add') {
                for ($i = 0; $i < $operation['count']; $i++) {
                    $arrayParams->add($operation['value'] + $i, $operation['index'] + $i);
                }
            } elseif ($operation['type'] == 'remove') {
                $arrayParams->remove($operation['index']);
            }

            $end = microtime(true);
            $elapsedTime = $end - $start;
            $results[$operation['type']] = $elapsedTime;
        }

        return $results;
    }

    public function tableResults($matrixResults, $singleResults, $vectorResults, $factorResults)
    {
        echo "\nРезультаты тестирования (время в секундах):\n";
        echo "--------------------------------------------------\n";
        echo "| Операция | MatrixArray | SingleArray | VectorArray | FactorArray |\n";
        echo "--------------------------------------------------\n";
        echo "| Добавить | " . number_format($matrixResults['add'], 6) . " | " . number_format($singleResults['add'], 6) . " | " . number_format($vectorResults['add'], 6) . " | " . number_format($factorResults['add'], 6) . " |\n";
        echo "| Удалить  | " . number_format($matrixResults['remove'], 6) . " | " . number_format($singleResults['remove'], 6) . " | " . number_format($vectorResults['remove'], 6) . " | " . number_format($factorResults['remove'], 6) . " |\n";
        echo "--------------------------------------------------\n";
    }
}