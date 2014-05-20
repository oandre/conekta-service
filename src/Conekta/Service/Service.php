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
        $charge->setBasicParameters();
        $response = $this->client->request($charge, 'POST');

        $chargeResponse = new ChargeResponse;
        $chargeResponse->getBasicResponse($response);

        var_dump($chargeResponse);
    }

}