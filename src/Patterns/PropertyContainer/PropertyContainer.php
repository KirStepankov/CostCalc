<?php

namespace CostCalc\Patterns\PropertyContainer;

use Exception;

class PropertyContainer implements PropertyContainerContract
{
    /**
     * @var array
     */
    private array $propertyContainer = [];

    /**
     * @param $propertyName
     * @param $value
     * @return PropertyContainer
     */
    public function setProperty($propertyName, $value): PropertyContainer
    {
        $this->propertyContainer[$propertyName] = $value;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function updateProperty($propertyName, $value): PropertyContainer
    {
        if (!isset($this->propertyContainer[$propertyName]))
        {
            throw new Exception("property {$propertyName} not found");
        }

        $this->propertyContainer[$propertyName] = $value;
        return $this;
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    public function getProperty($propertyName): mixed
    {
        return $this->propertyContainer[$propertyName];
    }

    public function getProperties(): array
    {
        return $this->propertyContainer;
    }

    /**
     * @param $propertyName
     * @return PropertyContainer
     */
    public function deleteProperty($propertyName): PropertyContainer
    {
        unset($this->propertyContainer[$propertyName]);
        return $this;
    }

}