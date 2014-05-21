<?php

namespace Conekta\Type;

abstract class AbstractType {

    CONST BASE_URL = 'https://api.conekta.io/';

    private $url;

    private $params = array();

    /**
     * @param mixed $url
     */
    protected function setUrl($url)
    {
        $this->url = self::BASE_URL . $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getParameters() {
        return $this->params;
    }

    /**
     * Function to set the requests parameters
     *
     * @return array
     */
    public function setParameters($parameters) {
        $this->params = $parameters;
    }

    /**
     * Basic param encoder. This function was provided by Conekta Documentation
     *
     * @link https://github.com/conekta/conekta-php/blob/master/lib/Conekta/Requestor.php
     *
     * @param $arr
     * @param null $prefix
     * @return string
     */
    public function encodeParams($arr, $prefix = null)
    {
        if (!is_array($arr)) {
            return $arr;
        }
        $r = array();
        foreach ($arr as $k => $v) {
            if (is_null($v)) {
                continue;
            }

            if ($prefix && $k && !is_int($k)) {
                $k = $prefix."[".$k."]";
            }
            else if ($prefix) {
                $k = $prefix."[]";
            }

            if (is_array($v)) {
                $r[] = self::encodeParams($v, $k, true);
            } else {
                if (is_bool($v)) {
                    $v = $v ? 'true' : 'false';
                }
                $r[] = urlencode($k)."=".urlencode($v);
            }
        }
        return implode("&", $r);
    }


}