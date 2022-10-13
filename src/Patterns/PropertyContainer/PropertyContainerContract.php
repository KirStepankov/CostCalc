<?php

namespace CostCalc\Patterns\PropertyContainer;

interface PropertyContainerContract
{
    public function setProperty($propertyName, $value);
    public function updateProperty($propertyName, $value);
    public function getProperty($propertyName);
    public function getProperties();
    public function deleteProperty($propertyName);
}