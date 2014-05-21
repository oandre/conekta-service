<?php

namespace Conekta\Type;

class RefundsResponse {

    private $createdAt;

    private $amount;

    private $currency;

    private $transaction;

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
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
     * @param mixed $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    public function getBasicResponse($response)
    {
        $this->setCreatedAt($response['created_at']);
        $this->setAmount($response['amount']);
        $this->setCurrency($response['currency']);
        $this->setTransaction($response['transaction']);

        return $this;
    }

    public function parseBasicResponse(array $responseList)
    {
        $refundArray = array();

        foreach ($responseList as $refundResponse) {
            $refund = new RefundsResponse();
            $refund->getBasicResponse($refundResponse);
            $refundArray[] = $refund;
        }

        return $refundArray;
    }

} 