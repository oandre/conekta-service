<?php
/**
 * Conekta Service
 *
 * @author André Simões <sou@oand.re>
 */

namespace Conekta\Service;

use Conekta\Type\ChargeRequest;
use Conekta\Service\Client;

class Service {

    private $client;

    function __construct()
    {
        $this->client = new Client;
    }

    public function createCharge(ChargeRequest $charge)
    {

        $param = array(
            'description' => $this->getDescription(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'reference_id' => $this->getReference(),
            'card' => $this->getToken()
        );

        $param = array();
        $this->client->request($charge, 'POST', $param);
    }

}