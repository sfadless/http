<?php

namespace Sfadless\Utils\Http;

interface SimpleHttpInterface
{
    /**
     * @param $url string
     * @param $params mixed
     * @param array $headers
     *
     * @return mixed
     */
    public function get($url, $params, array $headers = []);

    /**
     * @param $url string
     * @param $params mixed
     * @param array $headers
     *
     * @return mixed
     */
    public function post($url, $params, array $headers = []);

    /**
     * @param $url string
     * @param $method string
     * @param $params mixed
     * @param array $headers
     *
     * @return mixed
     */
    public function request($url, $method, $params, array $headers = []);
}