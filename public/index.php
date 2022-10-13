<?php

use CostCalc\Patterns\PropertyContainer\PropertyContainer;
use CostCalc\ProductsCosts;

$productsPrices = new PropertyContainer();
$productsPrices
    ->setProperty('Молоко', ['price' => 70, 'weight' => 900])
    ->setProperty('Сахар', ['price' => 140, 'weight' => 1000])
    ->setProperty('Шоколад белый', ['price' => 500, 'weight' => 1000])
    ->setProperty('Шоколад молочный', ['price' => 550, 'weight' => 1000])
    ->setProperty('Шоколад чёрный', ['price' => 490, 'weight' => 1000])
    ->setProperty('Сливки', ['price' => 600, 'weight' => 1000]);

$productsWeights = new PropertyContainer();
$productsWeights
    ->setProperty('Молоко', 3000)
    ->setProperty('Сахар', 500)
    ->setProperty('Сливки', 500)
    ->setProperty('Шоколад чёрный', 300);

$productsCosts = new ProductsCosts($productsPrices, $productsWeights);
print_r($productsCosts->getCosts());


