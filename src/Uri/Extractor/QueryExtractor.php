<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * QueryExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class QueryExtractor extends AbstractExtractorChain
{
    /**
     * {@inheritdoc}
     */
    public function extract($uriString, UriInterface $uri)
    {
        $exploded = explode(UriCreator::QUERY_DELIMITER, $uriString);

        if (isset($exploded[1])) {
            $uri->withQuery($exploded[1]);
        }

        return $this->handle($exploded[0], $uri);
    }
}