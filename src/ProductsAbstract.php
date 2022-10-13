<?php

namespace CostCalc;

use CostCalc\Patterns\PropertyContainer\PropertyContainerContract;

abstract class ProductsAbstract
{
    /**
     * @var int
     */
    protected int $hundredPercent = 1000;

    /**
     * @var PropertyContainerContract
     */
    protected PropertyContainerContract $productsPrices;

    /**
     * @var PropertyContainerContract
     */
    protected PropertyContainerContract $productsWeights;

    /**
     * @param PropertyContainerContract $productsPrices
     * @param PropertyContainerContract $productsWeights
     */
    public function __construct(PropertyContainerContract $productsPrices, PropertyContainerContract $productsWeights)
    {
        $this->productsPrices = $productsPrices;
        $this->productsWeights = $productsWeights;
    }
}