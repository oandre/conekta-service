<?php
/**
 * Conekta Service
 *
 * @author André Simões <sou@oand.re>
 */

namespace Conekta\Service;

use Conekta\Type\ChargeRequest;
use Conekta\Type\ChargeResponse;
use Conekta\Service\Client;

class Service {

    private $client;

    function __construct()
    {
        $this->client = new Client;
    }

    public function createCharge(ChargeRequest $charge)
    {
        $charge->setChargeParameters();
        $response = $this->client->request($charge, 'POST');

        $chargeResponse = new ChargeResponse;
        $chargeResponse->getBasicResponse($response);

        return $chargeResponse;
    }

    public function findCharge(ChargeRequest $charge)
    {
        $charge->setRetriveParameters();
        $response = $this->client->request($charge, 'GET');

        $chargeResponse = new ChargeResponse();
        $chargeResponse->getBasicResponse($response);

        return $chargeResponse;
    }

    public function refundCharge(ChargeRequest $charge)
    {
        $charge->setRefundParameters();
        $response = $this->client->request($charge, 'POST');

        $chargeResponse = new ChargeResponse();
        $chargeResponse->getRefundResponse($response);

        return $chargeResponse;
    }

    public function captureCharge(ChargeRequest $charge)
    {
        $charge->setCaptureParameters();
        $response = $this->client->request($charge, 'POST');

        $chargeResponse = new ChargeResponse();
        $chargeResponse->getCaptureResponse($response);

        return $chargeResponse;
    }

}