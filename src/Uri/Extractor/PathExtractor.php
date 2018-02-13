<?php

namespace Sfadless\Utils\Http\Uri\Extractor;
use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * PathExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class PathExtractor extends AbstractExtractorChain
{
    /**
     * {@inheritdoc}
     */
    public function extract($uriString, UriInterface $uri)
    {
        $position = strpos($uriString, UriCreator::PATH_DELIMITER);

        if (false === $position) {
            return $uriString;
        }

        $path = substr($uriString, $position + 1);

        $uri->withPath($path);

        $uriString = str_replace(UriCreator::PATH_DELIMITER . $path, '', $uriString);

        return $this->handle($uriString, $uri);
    }
}