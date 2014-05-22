<?php

namespace Conekta\Service;

use Conekta\Type\AbstractType;
use Conekta\Type\Error\Error;

class Client {

    CONST CONEKTA_VERSION = '1.9.6';

    CONST CONEKTA_API_VERSION = '0.3.0';

    private $conektaApiKey;

    /**
     * @param mixed $conektaApiKey
     */
    public function setConektaApiKey($conektaApiKey)
    {
        $this->conektaApiKey = $conektaApiKey;
    }

    /**
     * @return mixed
     */
    public function getConektaApiKey()
    {
        return $this->conektaApiKey;
    }

    private function setHeaders()
    {
        $user_agent = array('bindings_version' => self::CONEKTA_VERSION,
            'lang' => 'php',
            'lang_version' => phpversion(),
            'publisher' => 'conekta',
            'uname' => php_uname());
        $headers = array('Accept: application/vnd.conekta-v' . self::CONEKTA_API_VERSION . '+json',
            'X-Conekta-Client-User-Agent: ' . json_encode($user_agent),
            'User-Agent: Conekta/v1 PhpBindings/' . self::CONEKTA_VERSION,
            'Authorization: Basic ' . base64_encode($this->getConektaApiKey() . ':' ));
        return $headers;
    }

    public function request(AbstractType $type, $method)
    {
        $params = $type->encodeParams($type->getParameters());
        $url = $type->getUrl();

        $headers = $this->setHeaders();
        $curl = curl_init();
        $method = strtolower($method);
        $opts = array();
        $query = "";

        if (count($params) > 0)
        {
            $query = '?'.$params;
        }

        switch($method)
        {
            case 'get':
                $opts[CURLOPT_HTTPGET] = 1;
                $url = $url.$query;
                break;
            case 'post':
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            case 'put':
                $opts[CURLOPT_RETURNTRANSFER] = 1;
                $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            case 'delete':
                $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                $url = $url.$query;
                break;
            default:
                throw new Exception('Wrong method');
        }

        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = 30;
        $opts[CURLOPT_TIMEOUT] = 80;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_HTTPHEADER] = $headers;
        $opts[CURLOPT_CAINFO] = dirname(__FILE__) . '/../SslData/ca_bundle.crt';
        curl_setopt_array($curl, $opts);

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            $response = curl_error($curl);
        }

        curl_close($curl);

        if ($response_code != 200) {
            Error::errorHandler($response, $response_code);
        }

        return json_decode($response, true);
    }



} 