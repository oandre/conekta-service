<?php

namespace Conekta\Type;

use Conekta\Type\BillingAddressResponse;

class DetailsResponse {

    private $name;

    private $phone;

    private $email;

    private $dateOfBirth;

    private $billingAdddress;

    private $lineItems;

    function __construct()
    {
        $this->billingAdddress = new BillingAddressResponse;
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
     * @param mixed $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }

    /**
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->lineItems;
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
     * @param \Conekta\Type\BillingAddressResponse $billingAdddress
     */
    public function setBillingAdddress($billingAdddress)
    {
        $this->billingAdddress = $billingAdddress;
    }

    /**
     * @return \Conekta\Type\BillingAddressResponse
     */
    public function getBillingAdddress()
    {
        return $this->billingAdddress;
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

    public function getBasicResponse($response)
    {
        $this->setName($response['name']);
        $this->setPhone($response['phone']);
        $this->setEmail($response['email']);

        $lineItemsArray = $this->getLineItems();
        if (is_array($response['lite_items']) && count($response['lite_items']) > 0) {

            $lineItems = new LineItemsResponse();
            $lineItemsArray = $lineItems->parseBasicResponse($response['line_items']);
        }

        $this->setLineItems($lineItemsArray);

        return $this;
    }

    public function getAdvancedResponse($response)
    {
        $this->setName($response['name']);
        $this->setPhone($response['phone']);
        $this->setEmail($response['email']);

        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }
        if (array_key_exists('phone', $response)) {
            $this->setPhone($response['phone']);
        }
        if (array_key_exists('email', $response)) {
            $this->setEmail($response['email']);
        }
        if (array_key_exists('date_of_birth', $response)) {
            $this->setDateOfBirth($response['date_of_birth']);
        }

        $lineItemsArray = $this->getLineItems();
        if (is_array($response['line_items']) && count($response['line_items']) > 0) {

            $lineItems = new LineItemsResponse();
            $lineItemsArray = $lineItems->parseBasicResponse($response['line_items']);
        }

        $this->setLineItems($lineItemsArray);
        $this->setBillingAdddress($this->getBillingAdddress()->getBasicResponse($response['billing_address']));

        return $this;
    }

} 