<?php

namespace Laminas\Http\Header;

use Laminas\Http\Request;

use function array_keys;
use function explode;
use function implode;
use function preg_match;
use function sprintf;
use function strtolower;
use function strtoupper;
use function trim;

/**
 * Allow Header
 *
 * @link       http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.7
 */
class Allow implements HeaderInterface
{
    /**
     * List of request methods
     * true states that method is allowed, false - disallowed
     * By default GET and POST are allowed
     *
     * @var array
     */
    protected $methods = [
        Request::METHOD_OPTIONS => false,
        Request::METHOD_GET     => true,
        Request::METHOD_HEAD    => false,
        Request::METHOD_POST    => true,
        Request::METHOD_PUT     => false,
        Request::METHOD_DELETE  => false,
        Request::METHOD_TRACE   => false,
        Request::METHOD_CONNECT => false,
        Request::METHOD_PATCH   => false,
    ];

    /**
     * Create Allow header from header line
     *
     * @param string $headerLine
     * @return static
     * @throws Exception\InvalidArgumentException
     */
    public static function fromString($headerLine)
    {
        list($name, $value) = GenericHeader::splitHeaderLine($headerLine);
        // [$name, $value] = GenericHeader::splitHeaderLine($headerLine);

        // check to ensure proper header type for this factory
        if (strtolower($name) !== 'allow') {
            throw new Exception\InvalidArgumentException('Invalid header line for Allow string: "' . $name . '"');
        }

        $header = new static();
        $header->disallowMethods(array_keys($header->getAllMethods()));
        $header->allowMethods(explode(',', $value));

        return $header;
    }

    /**
     * Get header name
     *
     * @return string
     */
    public function getFieldName()
    {
        return 'Allow';
    }

    /**
     * Get comma-separated list of allowed methods
     *
     * @return string
     */
    public function getFieldValue()
    {
        return implode(', ', array_keys($this->methods, true, true));
    }

    /**
     * Get list of all defined methods
     *
     * @return array
     */
    public function getAllMethods()
    {
        return $this->methods;
    }

    /**
     * Get list of allowed methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array_keys($this->methods, true, true);
    }

    /**
     * Allow methods or list of methods
     *
     * @param array|string $allowedMethods
     * @return $this
     */
    public function allowMethods($allowedMethods)
    {
        foreach ((array) $allowedMethods as $method) {
            $method = trim(strtoupper($method));
            if (preg_match('/\s/', $method)) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Unable to whitelist method; "%s" is not a valid method',
                    $method
                ));
            }
            $this->methods[$method] = true;
        }

        return $this;
    }

    /**
     * Disallow methods or list of methods
     *
     * @param array|string $disallowedMethods
     * @return $this
     */
    public function disallowMethods($disallowedMethods)
    {
        foreach ((array) $disallowedMethods as $method) {
            $method = trim(strtoupper($method));
            if (preg_match('/\s/', $method)) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Unable to blacklist method; "%s" is not a valid method',
                    $method
                ));
            }
            $this->methods[$method] = false;
        }

        return $this;
    }

    /**
     * Convenience alias for @see disallowMethods()
     *
     * @param array|string $disallowedMethods
     * @return $this
     */
    public function denyMethods($disallowedMethods)
    {
        return $this->disallowMethods($disallowedMethods);
    }

    /**
     * Check whether method is allowed
     *
     * @param string $method
     * @return bool
     */
    public function isAllowedMethod($method)
    {
        $method = trim(strtoupper($method));

        // disallow unknown method
        if (! isset($this->methods[$method])) {
            $this->methods[$method] = false;
        }

        return $this->methods[$method];
    }

    /**
     * Return header as string
     *
     * @return string
     */
    public function toString()
    {
        return 'Allow: ' . $this->getFieldValue();
    }
}
