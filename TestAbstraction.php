<?php

require_once __DIR__ . '/vendor/autoload.php';

use Conekta\Type\ChargeRequest;
use Conekta\Service\Service;
use Conekta\Type\LineItemsRequest;

$charge = new ChargeRequest();
$charge->setDescription('Stogies');
$charge->setAmount('20000');
$charge->setCurrency('MXN');
$charge->setReference(uniqid('debit_'));
$charge->setToken('tok_test_visa_4242');
$charge->getDetails()->setName('Detail Name');
$charge->getDetails()->setEmail('Detail Email');
$charge->getDetails()->setPhone('Detail Phone');
$charge->getDetails()->setDateOfBirth('1980-09-24');
$billingAddress = $charge->getDetails()->getBillingAddress();
$billingAddress->setStreet1('Rua 1');
$billingAddress->setStreet2('Casa 2');
$billingAddress->setCity('São Paulo');
$billingAddress->setState('SP');
$billingAddress->setZipCode('02374010');
$billingAddress->setPhone('11 982134-432');
$billingAddress->setEmail('sou@oand.re');

$lineItems = array();
$lineItem = new LineItemsRequest();
$lineItem->setName('nome');
$lineItem->setDescription('description');
$lineItem->setQuantity(2);
$lineItem->setSku('sku');
$lineItem->setType('type');
$lineItem->setUnitPrice(432432);
$lineItem1 = new LineItemsRequest();
$lineItem1->setName('nome2');
$lineItem1->setDescription('description1');
$lineItem1->setQuantity(3);
$lineItem1->setSku('sku1');
$lineItem1->setType('type1');
$lineItem1->setUnitPrice(99999);
$lineItems[] = $lineItem;
$lineItems[] = $lineItem1;

$charge->getDetails()->setLineItems($lineItems);

$charge->getDetails()->setBillingAddress($billingAddress);

$service = new Service('1tv5yJp3xnVZ7eK67m4h');
$response = $service->createAdvancedCharge($charge);

//$response = $service->createCharge($charge);

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

