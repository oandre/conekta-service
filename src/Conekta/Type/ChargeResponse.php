<?php

namespace Conekta\Type;

use Conekta\Type\PaymentMethodResponse;
use Conekta\Type\DetailsResponse;
use Conekta\Type\RefundsResponse;

class ChargeResponse {

    private $id;

    private $liveMode;

    private $status;

    private $currency;

    private $description;

    private $reference;

    private $failureCode;

    private $failureMessage;

    private $monthlyInstallments;

    private $object;

    private $amount;

    private $amountRefunded;

    private $fee;

    private $customerId;

    private $refunds;

    private $paymentMethod;

    private $details;

    private $paidAt;

    private $createdAt;

    public function __construct()
    {
        $this->paymentMethod = new PaymentMethodResponse;
        $this->details = new DetailsResponse;
        $this->refunds = array();
    }

    /**
     * @param mixed $amountRefunded
     */
    public function setAmountRefunded($amountRefunded)
    {
        $this->amountRefunded = $amountRefunded;
    }

    /**
     * @return mixed
     */
    public function getAmountRefunded()
    {
        return $this->amountRefunded;
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
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
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
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return DetailsResponse
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $failureCode
     */
    public function setFailureCode($failureCode)
    {
        $this->failureCode = $failureCode;
    }

    /**
     * @return mixed
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * @param mixed $failureMessage
     */
    public function setFailureMessage($failureMessage)
    {
        $this->failureMessage = $failureMessage;
    }

    /**
     * @return mixed
     */
    public function getFailureMessage()
    {
        return $this->failureMessage;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
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
     * @param mixed $liveMode
     */
    public function setLiveMode($liveMode)
    {
        $this->liveMode = $liveMode;
    }

    /**
     * @return mixed
     */
    public function getLiveMode()
    {
        return $this->liveMode;
    }

    /**
     * @param mixed $monthlyInstallments
     */
    public function setMonthlyInstallments($monthlyInstallments)
    {
        $this->monthlyInstallments = $monthlyInstallments;
    }

    /**
     * @return mixed
     */
    public function getMonthlyInstallments()
    {
        return $this->monthlyInstallments;
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
     * @param mixed $paidAt
     */
    public function setPaidAt($paidAt)
    {
        $this->paidAt = $paidAt;
    }

    /**
     * @return mixed
     */
    public function getPaidAt()
    {
        return $this->paidAt;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
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
     * @param mixed $refunds
     */
    public function setRefunds($refunds)
    {
        $this->refunds = $refunds;
    }

    /**
     * @return mixed
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getBasicResponse($response)
    {
        $this->setId($response['id']);
        $this->setLiveMode($response['livemode']);
        $this->setStatus($response['status']);
        $this->setCurrency($response['currency']);
        $this->setDescription($response['description']);
        $this->setReference($response['reference_id']);
        $this->setFailureCode($response['failure_code']);
        $this->setFailureMessage($response['failure_message']);
        $this->setMonthlyInstallments($response['monthly_installments']);
        $this->setObject($response['object']);
        $this->setAmount($response['amount']);
        $this->setFee($response['fee']);
        $this->setCustomerId($response['customer_id']);

        $refundArray = $this->getRefunds();
        if (is_array($response['refunds']) && count($response['refunds']) > 0) {

            $refund = new RefundsResponse();
            $refundArray = $refund->parseBasicResponse($response['refunds']);
        }

        $this->setRefunds($refundArray);
        $this->setPaymentMethod($this->getPaymentMethod()->getBasicResponse($response['payment_method']));
        $this->setDetails($this->getDetails()->getBasicResponse($response['details']));
        $this->setPaidAt($response['paid_at']);
        $this->setCreatedAt($response['created_at']);

        return $this;
    }

    public function getAdvancedResponse($response)
    {
        $this->setId($response['id']);
        $this->setLiveMode($response['livemode']);
        $this->setStatus($response['status']);
        $this->setCurrency($response['currency']);
        $this->setDescription($response['description']);
        $this->setReference($response['reference_id']);
        $this->setFailureCode($response['failure_code']);
        $this->setFailureMessage($response['failure_message']);
        $this->setObject($response['object']);
        $this->setAmount($response['amount']);
        $this->setPaymentMethod($this->getPaymentMethod()->getBasicResponse($response['payment_method']));
        $this->setDetails($this->getDetails()->getAdvancedResponse($response['details']));
        $this->setCreatedAt($response['created_at']);

        return $this;
    }

    public function getCaptureResponse($response)
    {
        $this->setId($response['id']);
        $this->setLiveMode($response['livemode']);
        $this->setStatus($response['status']);
        $this->setCurrency($response['currency']);
        $this->setDescription($response['description']);
        $this->setReference($response['reference_id']);
        $this->setFailureCode($response['failure_code']);
        $this->setFailureMessage($response['failure_message']);
        $this->setObject($response['object']);
        $this->setAmount($response['amount']);
        $this->setPaymentMethod($this->getPaymentMethod()->getBasicResponse($response['payment_method']));
        $this->setCreatedAt($response['created_at']);

        return $this;
    }

    public function getRefundResponse($response)
    {
        $this->setId($response['id']);
        $this->setLiveMode($response['livemode']);
        $this->setStatus($response['status']);
        $this->setCurrency($response['currency']);
        $this->setDescription($response['description']);
        $this->setReference($response['reference_id']);
        $this->setFailureCode($response['failure_code']);
        $this->setFailureMessage($response['failure_message']);
        $this->setObject($response['object']);
        $this->setAmount($response['amount']);

        if (array_key_exists('amount_refunded', $response)) {
            $this->setAmountRefunded($response['amount_refunded']);
        }

        $refundArray = $this->getRefunds();
        if (is_array($response['refunds']) && count($response['refunds']) > 0) {

            $refund = new RefundsResponse();
            $refundArray = $refund->parseBasicResponse($response['refunds']);
        }

        $this->setRefunds($refundArray);
        $this->setPaymentMethod($this->getPaymentMethod()->getBasicResponse($response['payment_method']));
        $this->setCreatedAt($response['created_at']);

        return $this;
    }



} 