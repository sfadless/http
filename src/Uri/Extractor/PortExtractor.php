<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * PortExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class PortExtractor extends AbstractExtractorChain
{
    /**
     * {@inheritdoc}
     */
    public function extract($uriString, UriInterface $uri)
    {
        $exploded = explode(UriCreator::PORT_DELIMITER, $uriString);

        if (1 === count($exploded)) {
            return $uriString;
        }

        $uri->withPort((int) $exploded[1]);

        return $this->handle($exploded[0], $uri);
    }
}