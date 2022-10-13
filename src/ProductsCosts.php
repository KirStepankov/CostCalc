<?php

namespace CostCalc;

use CostCalc\Patterns\PropertyContainer\PropertyContainer;

class ProductsCosts extends ProductsAbstract
{


    public function getCosts(): array
    {
        $this->normalizeWeights();
        return $this->createCostsProducts();
    }

    private function createCostsProducts(): array
    {
        $costsProducts = new PropertyContainer();

        foreach ($this->productsWeights->getProperties() as $key => $weight) {
            //Получить процент во сколько меньше или больше вес продукта от 1000
            $percent = Helper::getPercentWeight($this->hundredPercent, $weight);

            //Увеличить или уменьшить сумму в зависимости от процента
            $price = $this->productsPrices->getProperty($key)['price'];
            $price = Helper::getPricePercent($price, $percent);

            $arr = [
                'price' => $price,
                'volume' => $weight
            ];

            $costsProducts->setProperty($key, $arr);
        }

        return $costsProducts->getProperties();
    }

    //TODO Возможно заменить цикль на array_map
    private function normalizeWeights()
    {
        foreach ($this->productsPrices->getProperties() as $key => $property) {
            if ($property['volume'] == $this->hundredPercent) {
                continue;
            }

            $this->updateProduct($key, $property['volume'], $property['price']);
        }
    }

    private function updateProduct($key, $volume, $price)
    {
        $percent = Helper::getPercentFromNumber($this->hundredPercent, $volume, true);

        $arr = [
            'price' => Helper::getIncreasePrice($price, $percent),
            'volume' => $this->hundredPercent
        ];

        $this->productsPrices->updateProperty($key, $arr);
    }


}