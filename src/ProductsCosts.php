<?php

namespace CostCalc;

use CostCalc\Patterns\PropertyContainer\PropertyContainer;

class ProductsCosts extends ProductsAbstract
{


    public function getCosts()
    {
        $this->normalizeWeights();
        //return $this->createCostsProducts();
    }

    //TODO РЕализовать метод
    private function createCostsProducts()
    {
//        $costsProducts = new PropertyContainer();
//
//        foreach ($this->productsWeights->getProperties() as $key => $weight) {
//            $percentWeight = Helper::getPercentFromNumber($this->hundredPercent, $weight, false);
//
//            $arr = [
//                'price' => Helper::getIncreasePrice($price, $percent),
//                'volume' => $property['volume']
//            ];
//
//            $costsProducts->setProperty($key, $arr);
//        }
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