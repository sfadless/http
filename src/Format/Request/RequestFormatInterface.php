<?php

namespace Sfadless\Utils\Http\Format\Request;

interface RequestFormatInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function formatParams($params);
}