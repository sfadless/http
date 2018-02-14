<?php

namespace Sfadless\Utils\Http\Format\Response;
use Sfadless\Utils\Http\SimpleHttpException;

/**
 * JsonResponseFormat
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class JsonResponseFormat implements ResponseFormatInterface
{
    /**
     * @param $response
     * @return mixed
     * @throws SimpleHttpException
     */
    public function getFormattedResponse($response)
    {
        $json = json_decode($response, true);

        if (!$json) {
            throw new SimpleHttpException('Cant convert response to json format');
        }

        return $json;
    }
}