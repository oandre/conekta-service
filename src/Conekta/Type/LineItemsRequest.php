<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;

class LineItemsRequest extends AbstractType{

    private $name;

    private $sku;

    private $unitPrice;

    private $description;

    private $quantity;

    private $type;

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setAdvancedChargeParameters($lineItems)
    {

        $lineItemsArray = array();

        foreach ($lineItems as $lineItem) {
            $parameters = array(
                'name' => $lineItem->getName(),
                'sku' => $lineItem->getSku(),
                'unit_price' => $lineItem->getUnitPrice(),
                'description' => $lineItem->getDescription(),
                'quantity' => $lineItem->getQuantity(),
                'type' => $lineItem->getType()
            );

            $lineItemsArray[] = $parameters;
        }

        return $lineItemsArray;
    }

}