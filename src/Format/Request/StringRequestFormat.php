<?php

namespace Sfadless\Utils\Http\Format\Request;

use Sfadless\Utils\Http\Format\Response\ResponseFormatInterface;

/**
 * StringRequestFormat
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class StringRequestFormat implements ResponseFormatInterface
{
    /**
     * @param $response
     * @return mixed|string
     */
    public function getFormattedResponse($response)
    {
        return (string) $response;
    }
}