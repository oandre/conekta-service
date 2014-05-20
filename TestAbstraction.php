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
$charge->setBasicParameters();

$service = new Service();
$service->createCharge($charge);