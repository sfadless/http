<?php

namespace Sfadless\Utils\Http\Format\Request;

/**
 * ArrayRequest
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ArrayRequestFormat implements RequestFormatInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function formatParams($params)
    {
        return http_build_query($params, '', '&');
    }
}