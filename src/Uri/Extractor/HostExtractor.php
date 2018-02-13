<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;

/**
 * HostExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class HostExtractor extends AbstractExtractorChain
{
    public function extract($uriString, UriInterface $uri)
    {
        $uri->withHost($uriString);

        return $this->handle($uriString, $uri);
    }
}