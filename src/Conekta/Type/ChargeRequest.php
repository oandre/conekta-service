<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;
use Conekta\Type\DetailsRequest;

class ChargeRequest extends AbstractType{

    private $id;

    private $key;

    private $token;

    private $amount;

    private $currency;

    private $description;

    private $reference;

    private $details;

    public function __construct()
    {
        $this->details = new DetailsRequest();
        $this->setUrl('charges');
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @param \Conekta\Type\DetailsRequest $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return \Conekta\Type\DetailsRequest
     */
    public function getDetails()
    {
        return $this->details;
    }

    public function setChargeParameters()
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

    public function setAdvancedChargeParameters()
    {
        $parameters = array(
            'description' => $this->getDescription(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'reference_id' => $this->getReference(),
            'card' => $this->getToken(),
            'details' => $this->getDetails()->setAdvancedChargeParameters(true)
        );

        $this->setParameters($parameters);

        return $this;
    }

    public function setCaptureParameters()
    {
        $this->setUrl('charges/' . $this->getId() . '/capture');

        return $this;
    }

    public function setRetrieveParameters()
    {
        $this->setUrl('charges/' . $this->getId());

        return $this;
    }

    public function setRefundParameters()
    {
        $this->setUrl('charges/' . $this->getId() . '/refund');

        return $this;
    }

}