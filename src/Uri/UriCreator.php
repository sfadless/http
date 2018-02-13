<?php

namespace Sfadless\Utils\Http\Uri;

use Psr\Http\Message\UriInterface;
use Sfadless\Utils\Http\Uri\Extractor\ExtractorInterface;
use Sfadless\Utils\Http\Uri\Extractor\FragmentExtractor;
use Sfadless\Utils\Http\Uri\Extractor\HostExtractor;
use Sfadless\Utils\Http\Uri\Extractor\PathExtractor;
use Sfadless\Utils\Http\Uri\Extractor\PortExtractor;
use Sfadless\Utils\Http\Uri\Extractor\QueryExtractor;
use Sfadless\Utils\Http\Uri\Extractor\SchemeExtractor;
use Sfadless\Utils\Http\Uri\Extractor\UserExtractor;

/**
 * UriCreator
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class UriCreator
{
    const SCHEME_DELIMITER = '://';
    const USER_PASSWORD_DELIMITER = ':';
    const USER_HOST_DELIMITER = '@';
    const PORT_DELIMITER = ':';
    const PATH_DELIMITER = '/';
    const QUERY_DELIMITER = '?';
    const FRAGMENT_DELIMITER = '#';

    /**
     * @param $uriString
     * @return UriInterface
     */
    public function create($uriString)
    {
        $uri = new Uri();

        $uriString = strtolower($uriString);

        $this->getChain()->extract($uriString, $uri);

        return $uri;
    }

    /**
     * @return ExtractorInterface
     */
    private function getChain()
    {
        $firstChain = new FragmentExtractor();

        $firstChain
            ->setNext(new SchemeExtractor())
            ->setNext(new QueryExtractor())
            ->setNext(new PathExtractor())
            ->setNext(new UserExtractor())
            ->setNext(new PortExtractor())
            ->setNext(new HostExtractor())
        ;

        return $firstChain;
    }
}