<?php

use Services\FactorArray;
use Services\MatrixArray;
use Services\SingleArray;
use Services\Test;
use Services\VectorArray;

require_once "Services/SingleArray.php";
require_once "Services/VectorArray.php";
require_once "Services/FactorArray.php";
require_once "Services/MatrixArray.php";
require_once "Services/Test.php";
require_once "Services/PriorityQueue.php";



// Параметры тестирования
$operations = [
    ['type' => 'add', 'value' => 1, 'index' => 0, 'count' => 30],
    ['type' => 'remove', 'value' => null, 'index' => 0, 'count' => 1],
];

$matrixArray = new MatrixArray();
$singleArray = new SingleArray();
$vectorArray = new VectorArray();
$factorArray = new FactorArray();

$test = new Test();
$matrixResults = $test->test('MatrixArray', $matrixArray, $operations);
$singleResults = $test->test('SingleArray', $singleArray, $operations);
$vectorResults = $test->test('VectorArray', $vectorArray, $operations);
$factorResults = $test->test('FactorArray', $factorArray, $operations);
$test->tableResults($matrixResults, $singleResults, $vectorResults, $factorResults);

$prioQueue = new \Services\PriorityQueue();
$prioQueue->enqueue(5, 5);
$prioQueue->enqueue(6, 6);
$prioQueue->enqueue(7, 7);
$prioQueue->enqueue(2, 2);
$prioQueue->enqueue(3, 3);
$prioQueue->enqueue(1, 1);
$prioQueue->enqueue(4, 4);

echo $prioQueue->dequeue();
