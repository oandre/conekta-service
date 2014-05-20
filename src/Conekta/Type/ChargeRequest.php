<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;

class ChargeRequest extends AbstractType{

    private $key;

    private $token;

    private $amount;

    private $currency;

    private $description;

    private $reference;

    public function __construct()
    {
        $this->setUrl('charges');
    }


    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

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
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    public function setBasicParameters()
    {
        $parameters = array(
            'description' => $this->getDescription(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'reference_id' => $this->getReference(),
            'card' => $this->getToken()
        );

        $this->setParameters($parameters);

        return $this;
    }

}