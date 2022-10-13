# CostCalc
Считает себистоимость из пулла продуктов с 
возможностями: 
- Заполнять список товаров, которые вы купили (их стоимость и вес, например, молоко 900мл 70р)
- Заполнять сколько вы потратили конкретного продукта в вашем блюде

В ответе мы получаем объект PropertyContainerContract со всеми выбранными
товарами в вашем блюде (Себистоимость, вес)

# Документация
Создаём объект с общим списком продуктов
<pre>
$productsPrices = new PropertyContainer();
$productsPrices
->setProperty('Молоко', ['price' => 70, 'weight' => 900])
->setProperty('Сахар', ['price' => 140, 'weight' => 1000])
->setProperty('Шоколад белый', ['price' => 500, 'weight' => 1000])
->setProperty('Шоколад молочный', ['price' => 550, 'weight' => 1000])
->setProperty('Шоколад чёрный', ['price' => 490, 'weight' => 1000])
->setProperty('Сливки', ['price' => 600, 'weight' => 1000]);
</pre>

Создаём объект с продуктами, которые используем конкрентно в блюде
<pre>
$productsWeights = new PropertyContainer();
$productsWeights
->setProperty('Молоко', 3000)
->setProperty('Сахар', 500)
->setProperty('Сливки', 500)
->setProperty('Шоколад чёрный', 300);
</pre>

Передаём всё в основной класс и получаем данные
<pre>
$productsCosts = new ProductsCosts($productsPrices, $productsWeights);
print_r($productsCosts->getCosts());
</pre>

