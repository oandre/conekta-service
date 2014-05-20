<?php

namespace Conekta\Type;

class DetailsResponse {

    private $name;

    private $phone;

    private $email;

    private $lineItems;

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

    public function getBasicResponse($response)
    {
        $this->setName($response['name']);
        $this->setPhone($response['phone']);
        $this->setEmail($response['email']);
        $this->setLineItems($response['lite_items']);

        return $this;
    }

} 