<?php

namespace Sfadless\Utils\Http\Uri\Extractor;

use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * FragmentExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class FragmentExtractor extends AbstractExtractorChain
{
    /**
     * {@inheritdoc}
     */
    public function extract($uriString, UriInterface $uri)
    {
        $exploded = explode(UriCreator::FRAGMENT_DELIMITER, $uriString);

        if (isset($exploded[1])) {
            $uri->withFragment($exploded[1]);
        }

        return $this->handle($exploded[0], $uri);
    }
}