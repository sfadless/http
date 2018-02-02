<?php

namespace Sfadless\Utils\Http;

/**
 * Http
 *
 * @author Pavel Golikov pgolikov327@gmail.com
 */
class Http implements SimpleHttpInterface
{
    const JSON_FORMAT = 'json';

    const STRING_FORMAT = 'string';

    /**
     * @var string
     */
    private $returnFormat;

    /**
     * {@inheritdoc}
     */
    public function post($url, array $params = [], array $headers = [])
    {
        return $this->request($url, $params, $headers, true);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url, array $params = [], array $headers = [])
    {
        return $this->request($url, $params, $headers, false);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $headers
     * @param $post
     * @return mixed
     * @throws SimpleHttpException
     */
    private function request($url, array $data = [], array $headers = [], $post)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, $post);
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        if (count($headers) > 0) {
            $headersForSend = [];

            foreach ($headers as $header => $value) {
                $headersForSend[] = "{$header}: {$value}";
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headersForSend);
        }

        $result = curl_exec($ch);

        curl_close($ch);

        if ($this->returnFormat === self::JSON_FORMAT) {
            return $this->returnJson($result);
        }

        return $result;
    }

    /**
     * @param $result
     * @return mixed
     * @throws SimpleHttpException
     */
    private function returnJson($result)
    {
        $returned = json_decode($result, true);

        if (!$returned) {
            throw new SimpleHttpException('Response is not in JSON format');
        }

        return $returned;
    }

    /**
     * Http constructor.
     * @param string $format
     */
    public function __construct($format = self::STRING_FORMAT)
    {
        $this->returnFormat = $format;
    }
}