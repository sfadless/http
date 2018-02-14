<?php

namespace Sfadless\Utils\Http;
use Sfadless\Utils\Http\Format\Request\ArrayRequestFormat;
use Sfadless\Utils\Http\Format\Request\RequestFormatInterface;
use Sfadless\Utils\Http\Format\Response\ResponseFormatInterface;
use Sfadless\Utils\Http\Format\Response\StringResponseFormat;

/**
 * Http
 *
 * @author Pavel Golikov pgolikov327@gmail.com
 */
class Http implements SimpleHttpInterface
{
    /**
     * @var RequestFormatInterface
     */
    private $requestFormat;

    /**
     * @var ResponseFormatInterface
     */
    private $responseFormat;

    /**
     * {@inheritdoc}
     */
    public function post($url, $params, array $headers = [])
    {
        return $this->request($url, 'POST', $params, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url, $params, array $headers = [])
    {
        if (is_array($params) && count($params) > 0) {
            $url = $url . '?' . http_build_query($params);
        }

        return $this->request($url, 'GET', $params, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function request($url, $method, $params = [], array $headers = [])
    {
        $options = [
            'http' => [
                'method' => $method,
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "content" => $this->requestFormat->formatParams($params)
            ]
        ];

        $context = stream_context_create($options);

        $content = file_get_contents($url, false, $context);

        if (false === $content) {
            return false;
        }

        return $this->responseFormat->getFormattedResponse($content);
    }

    /**
     * Http constructor.
     * @param RequestFormatInterface|null $requestFormat
     * @param ResponseFormatInterface|null $responseFormat
     */
    public function __construct(
        RequestFormatInterface $requestFormat = null,
        ResponseFormatInterface $responseFormat = null
    ) {
        $this->requestFormat = $requestFormat;
        $this->responseFormat = $responseFormat;

        if (null === $this->requestFormat) {
            $this->requestFormat = new ArrayRequestFormat();
        }

        if (null === $this->responseFormat) {
            $this->responseFormat = new StringResponseFormat();
        }
    }
}