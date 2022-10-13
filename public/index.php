<?php

use CostCalc\Patterns\PropertyContainer\PropertyContainer;
use CostCalc\ProductsCosts;

$productsPrices = new PropertyContainer();
$productsPrices
    ->setProperty('Молоко', ['price' => 70, 'volume' => 900])
    ->setProperty('Сахар', ['price' => 140, 'volume' => 1000])
    ->setProperty('Шоколад белый', ['price' => 500, 'volume' => 1000])
    ->setProperty('Шоколад молочный', ['price' => 550, 'volume' => 1000])
    ->setProperty('Шоколад чёрный', ['price' => 490, 'volume' => 1000])
    ->setProperty('Сливки', ['price' => 600, 'volume' => 1000]);

$productsWeights = new PropertyContainer();
$productsWeights
    ->setProperty('Молоко', 330)
    ->setProperty('Сахар', 500)
    ->setProperty('Сливки', 500)
    ->setProperty('Шоколад чёрный', 300);

$productsCosts = new ProductsCosts($productsPrices, $productsWeights);
print_r($productsCosts->getCosts());


