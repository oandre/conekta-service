<?php

namespace Conekta\Type;

class AddressResponse {

    private $street1;

    private $street2;

    private $street3;

    private $city;

    private $state;

    private $zipCode;

    private $country;

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $street1
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
    }

    /**
     * @return mixed
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * @param mixed $street2
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
    }

    /**
     * @return mixed
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param mixed $street3
     */
    public function setStreet3($street3)
    {
        $this->street3 = $street3;
    }

    /**
     * @return mixed
     */
    public function getStreet3()
    {
        return $this->street3;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getBasicResponse($response)
    {
        $this->setStreet1($response['street1']);
        $this->setStreet2($response['street2']);
        $this->setStreet3($response['street3']);
        $this->setCity($response['city']);
        $this->setState($response['state']);
        $this->setZipCode($response['zip']);
        $this->setCountry($response['country']);

        return $this;
    }

}