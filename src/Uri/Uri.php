<?php

namespace Sfadless\Utils\Http\Uri;

use Psr\Http\Message\UriInterface;

/**
 * Uri
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Uri implements UriInterface
{
    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $fragment;

    /**
     * {@inheritdoc}
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthority()
    {
        $auth = $this->host;

        if (strlen($this->getUserInfo()) > 0) {
            $auth = $this->getUserInfo() . '@' . $auth;
        }

        if ($this->getPort()) {
            $auth .= ':' . $this->getPort();
        }

        return $auth;
    }

    /**
     * @return string
     */
    public function getUserInfo()
    {
        if (0 === strlen($this->user)) {
            return '';
        }

        return $this->user . (strlen($this->password) > 0 ? ':' . $this->password : '');
    }

    /**
     * {@inheritdoc}
     */
    public function getHost()
    {
        return $this->host ? $this->host : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getPort()
    {
        return $this->port ? $this->port : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return $this->path ? $this->path : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        return $this->query ? $this->query : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getFragment()
    {
        return $this->fragment ? $this->fragment : '';
    }

    /**
     * {@inheritdoc}
     */
    public function withScheme($scheme)
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withUserInfo($user, $password = null)
    {
        $this->user = $user;

        if (null !== $password) {
            $this->password = $password;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFragment($fragment)
    {
        $this->fragment = $fragment;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $string = '';

        if (strlen($this->scheme) > 0) {
            $string .= $this->scheme . ':';
        }

        if (strlen($this->getAuthority()) > 0) {
            $string .= '//' . $this->getAuthority();
        }

        if (strlen($this->path) > 0) {
            $string .= '/' . $this->path;
        }

        if (strlen($this->query) > 0) {
            $string .= '?' . $this->query;
        }

        if (strlen($this->fragment) > 0) {
            $string .= '#' . $this->fragment;
        }

        return $string;
    }

}