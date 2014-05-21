<?php

require_once __DIR__ . '/vendor/autoload.php';

use Conekta\Type\ChargeRequest;
use Conekta\Service\Service;


$charge = new ChargeRequest();
$charge->setDescription('Stogies');
$charge->setAmount('20000');
$charge->setCurrency('MXN');
$charge->setReference(uniqid('debit_'));
$charge->setToken('tok_test_visa_4242');

$service = new Service();
$response = $service->createCharge($charge);

//$chargeFind = new ChargeRequest();
//$chargeFind->setId($response->getId());
//
//$responseFind = $service->findCharge($chargeFind);
//
//$chargeRefund = new ChargeRequest();
//$chargeRefund->setId($response->getId());
//
//$responseRefund = $service->refundCharge($chargeRefund);

$chargeCapture = new ChargeRequest();
$chargeCapture->setId($response->getId());

$responseCapture = $service->refundCharge($chargeCapture);

