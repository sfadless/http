<?php

namespace Sfadless\Utils\Http;

interface SimpleHttpInterface
{
    /**
     * @param $url string
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function get($url, array $params = [], array $headers = []);

    /**
     * @param $url string
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function post($url, array $params = [], array $headers = []);
}