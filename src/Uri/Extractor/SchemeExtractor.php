<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * SchemeExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class SchemeExtractor extends AbstractExtractorChain
{
    /**
     * {@inheritdoc}
     */
    public function extract($uriString, UriInterface $uri)
    {
        $exploded = explode(UriCreator::SCHEME_DELIMITER, $uriString);

        if (count($exploded) > 1) {
            $uri->withScheme($exploded[0]);

            return $this->handle($exploded[1], $uri);
        }

        return $this->handle($exploded[0], $uri);
    }
}