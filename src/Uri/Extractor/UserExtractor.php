<?php

namespace Sfadless\Utils\Http\Uri\Extractor;
use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\UriCreator;

/**
 * UserExtractor
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class UserExtractor extends AbstractExtractorChain
{
    public function extract($uriString, UriInterface $uri)
    {
        $exploded = explode(UriCreator::USER_HOST_DELIMITER, $uriString);

        if (1 === count($exploded)) {
            return $this->handle($uriString, $uri);
        }

        $host = $exploded[1];

        $exploded = explode(UriCreator::USER_PASSWORD_DELIMITER, $exploded[0]);

        $uri->withUserInfo($exploded[0], isset($exploded[1]) ? $exploded[1] : null);

        return $this->handle($host, $uri);
    }
}