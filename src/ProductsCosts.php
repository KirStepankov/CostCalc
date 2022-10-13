<?php

namespace CostCalc;

use CostCalc\Patterns\PropertyContainer\PropertyContainer;

//TODO Внедрить проверку на входные данные, а именно price и volume
class ProductsCosts extends ProductsAbstract
{
    /**
     * @return array
     */
    public function getCosts(): array
    {
        $this->normalizeWeights();
        return $this->createCostsProducts();
    }

    /**
     * @return array
     */
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
                'weight' => $weight
            ];

            $costsProducts->setProperty($key, $arr);
        }

        return $costsProducts->getProperties();
    }

    /**
     * @return void
     */
    private function normalizeWeights(): void
    {
        foreach ($this->productsPrices->getProperties() as $key => $property) {
            if ($property['weight'] == $this->hundredPercent) {
                continue;
            }

            $this->updateProduct($key, $property['weight'], $property['price']);
        }
    }

    /**
     * @param $key
     * @param $volume
     * @param $price
     * @return void
     */
    private function updateProduct($key, $volume, $price): void
    {
        $percent = Helper::getPercentFromNumber($this->hundredPercent, $volume);

        $arr = [
            'price' => Helper::getIncreasePrice($price, $percent),
            'weight' => $this->hundredPercent
        ];

        $this->productsPrices->updateProperty($key, $arr);
    }


}