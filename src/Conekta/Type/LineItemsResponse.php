<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;

class LineItemsResponse extends AbstractType{

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

    public function getBasicResponse($response)
    {
        $this->setName($response['name']);
        $this->setSku($response['sku']);
        $this->setUnitPrice($response['unit_price']);
        $this->setDescription($response['description']);
        $this->setQuantity($response['quantity']);
        $this->setType($response['type']);

        return $this;
    }

    public function parseBasicResponse(array $responseList)
    {
        $refundArray = array();

        foreach ($responseList as $refundResponse) {
            $refund = new LineItemsResponse();
            $refund->getBasicResponse($refundResponse);
            $refundArray[] = $refund;
        }

        return $refundArray;
    }

}