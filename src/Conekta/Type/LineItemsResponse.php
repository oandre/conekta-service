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
        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }

        if (array_key_exists('sku', $response)) {
            $this->setSku($response['sku']);
        }

        if (array_key_exists('unit_price', $response)) {
            $this->setUnitPrice($response['unit_price']);
        }

        if (array_key_exists('description', $response)) {
            $this->setDescription($response['description']);
        }

        if (array_key_exists('quantity', $response)) {
            $this->setQuantity($response['quantity']);
        }

        if (array_key_exists('type', $response)) {
            $this->setType($response['type']);
        }

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