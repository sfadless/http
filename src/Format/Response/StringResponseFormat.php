<?php

namespace Sfadless\Utils\Http\Format\Response;

/**
 * StringResponseFormat
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class StringResponseFormat implements ResponseFormatInterface
{
    /**
     * @param $response
     * @return mixed
     */
    public function getFormattedResponse($response)
    {
        return $response;
    }
}