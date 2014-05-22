<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;

class BillingAddressRequest extends AbstractType{

    private $street1;

    private $street2;

    private $street3;

    private $city;

    private $state;

    private $zipCode;

    private $phone;

    private $email;

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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
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

    public function setAdvancedChargeParameters($array = false)
    {
        $parameters = array(
            'street1' => $this->getStreet1(),
            'street2' => $this->getStreet2(),
            'street3' => $this->getStreet3(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'zip' => $this->getZipCode(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
        );

        if ($array) {

            return $parameters;
        }

        $this->setParameters($parameters);

        return $this;
    }

}