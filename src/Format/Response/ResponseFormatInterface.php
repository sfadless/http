<?php

namespace Sfadless\Utils\Http\Format\Response;

interface ResponseFormatInterface
{
    /**
     * @param $response
     * @return mixed
     */
    public function getFormattedResponse($response);
}