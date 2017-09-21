<?php

namespace Sfadless\Utils\Http;

/**
 * Http
 *
 * @author Pavel Golikov pgolikov327@gmail.com
 */
class Http
{
    /**
     * @param $url string
     * @param $data array
     *
     * @return mixed
     */
    public function post($url, $data = [])
    {
        return $this->request($url, $data, true);

    }

    /**
     * @param $url string
     * @param $data array
     *
     * @return mixed
     */
    public function get($url, $data = [])
    {
        return $this->request($url, $data, false);
    }

    /**
     * @param $url string
     * @param $data array
     * @param $post bool
     *
     * @return mixed
     */
    public function request($url, $data, $post)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, $post);
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }
}