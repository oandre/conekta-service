<?php

namespace Conekta\Type\Error;

use Conekta\Type\AbstractType;
use Conekta\Type\Error\ApiError;
use Conekta\Type\Error\NoConnectionError;
use Conekta\Type\Error\AuthenticationError;
use Conekta\Type\Error\ParameterValidationError;
use Conekta\Type\Error\ProcessingError;
use Conekta\Type\Error\ResourceNotFoundError;
use Conekta\Type\Error\MalformedRequestError;

class Error extends \Exception
{
    public function __construct($message, $type=null, $code=null, $params=null) {
        parent::__construct($message);
        $this->message = $message;
        $this->type = $type;
        $this->code = $code;
        $this->params = $params;
    }

    public static function errorHandler($resp, $code) {
        $resp = json_decode($resp, true);
        $message = isset($resp['message']) ? $resp['message'] : null;
        $type = isset($resp['type']) ? $resp['type'] : null;
        $params = isset($resp['param']) ? $resp['param'] : null;
        if (isset($code) != true || $code == 0) {
            throw new NoConnectionError('Could not connect to '.AbstractType::BASE_URL, $type, $code, $params);
        }
        switch ($code) {
            case 400:
                throw new MalformedRequestError($message, $type, $code, $params);
            case 401:
                throw new AuthenticationError($message, $type, $code, $params);
            case 402:
                throw new ProcessingError($message, $type, $code, $params);
            case 404:
                throw new ResourceNotFoundError($message, $type, $code, $params);
            case 422:
                throw new ParameterValidationError($message, $type, $code, $params);
            case 500:
                throw new ApiError($message, $type, $code, $params);
            default:
                throw new Error($message, $type, $code, $params);
        }
    }
}
