<?php

namespace Conekta\Type;

use Conekta\Type\AbstractType;
use Conekta\Type\BillingAddressRequest;

class DetailsRequest extends AbstractType{

    private $name;

    private $email;

    private $phone;

    private $dateOfBirth;

    private $billingAddress;

    private $lineItems;

    function __construct()
    {
        $this->billingAddress = new BillingAddressRequest();
        $this->lineItems = array();
    }

    /**
     * @param BillingAddressRequest $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return \Conekta\Type\BillingAddressRequest
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
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
     * @param array $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    public function setAdvancedChargeParameters($array = false)
    {

        $lineItemsRequest = new LineItemsRequest();

        $parameters = array(
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'date_of_birth' => $this->getDateOfBirth(),
            'billing_address' => $this->getBillingAddress()->setAdvancedChargeParameters($array),
            'line_items' => $lineItemsRequest->setAdvancedChargeParameters($this->getLineItems())
        );

        if ($array) {

            return $parameters;
        }

        $this->setParameters($parameters);

        return $this;
    }

}