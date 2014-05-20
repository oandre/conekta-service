<?php

namespace Conekta\Service;

use Conekta\Type\AbstractType;

class Client {

    public function request(AbstractType $type, $method, $params = null)
    {
        $params = $type->encodeParams($params);
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
                $url = $type->getUrl().$query;
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
                $url = $type->getUrl().$query;
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
        curl_close($curl);
        if ($response_code != 200) {
            Conekta_Error::errorHandler($response, $response_code);
        }
        return json_decode($response, true);
    }

} 