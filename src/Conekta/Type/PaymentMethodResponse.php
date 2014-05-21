<?php

namespace Conekta\Type;

use Conekta\Type\AddressResponse;

class PaymentMethodResponse {

    private $name;

    private $expirationMonth;

    private $expirationYear;

    private $authCode;

    private $object;

    private $cvv;

    private $brand;

    private $address;

    function __construct()
    {
        $this->address = new AddressResponse;
    }

    /**
     * @param mixed $authCode
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    /**
     * @return mixed
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $expirationMonth
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationYear
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
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
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Conekta\Type\AddressResponse $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Conekta\Type\AddressResponse
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function getBasicResponse($response)
    {
        $this->setName($response['name']);
        $this->setExpirationMonth($response['exp_month']);
        $this->setExpirationYear($response['exp_year']);
        $this->setAuthCode($response['auth_code']);
        $this->setObject($response['object']);
        $this->setCvv($response['last4']);
        $this->setBrand($response['brand']);

        return $this;
    }

    public function getCaptureResponse($response)
    {
        $this->setName($response['name']); //
        $this->setExpirationMonth($response['exp_month']);//
        $this->setExpirationYear($response['exp_year']);//
        $this->setAuthCode($response['auth_code']);//
        $this->setObject($response['object']);//
        $this->setCvv($response['last4']);//
        $this->setBrand($response['brand']);//
        $this->setAddress($this->getAddress()->getBasicResponse($response['address']));

        return $this;
    }

} 