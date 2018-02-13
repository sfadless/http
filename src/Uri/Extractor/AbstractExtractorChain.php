<?php

namespace Sfadless\Utils\Http\Uri\Extractor;
use Psr\Http\Message\UriInterface;

/**
 * AbstractExtractorChain
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
abstract class AbstractExtractorChain implements ExtractorInterface
{
    /**
     * @var AbstractExtractorChain
     */
    protected $next = null;

    /**
     * @return bool
     */
    protected function hasNext()
    {
        return null !== $this->next;
    }

    /**
     * @param AbstractExtractorChain $extractor
     * @return AbstractExtractorChain
     */
    public function setNext(AbstractExtractorChain $extractor)
    {
        $this->next = $extractor;

        return $this->next;
    }

    /**
     * @param $uriString
     * @param UriInterface $uri
     * @return string
     */
    protected function handle($uriString, UriInterface $uri)
    {
        if ($this->hasNext()) {
            return $this->next->extract($uriString, $uri);
        }

        return $uriString;
    }
}