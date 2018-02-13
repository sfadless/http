<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;

/**
 * ExtractorInterface
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
interface ExtractorInterface
{
    /**
     * @param $uriString string
     * @param UriInterface $uri
     * @return string
     */
    public function extract($uriString, UriInterface $uri);
}