<?php

namespace Laminas\Http\Header;

use function sprintf;
use function strtolower;

/**
 * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.8
 *
 * @throws Exception\InvalidArgumentException
 */
class Authorization implements HeaderInterface
{
    /** @var string */
    protected $value;

    /**
     * @param string $headerLine
     * @return static
     */
    public static function fromString($headerLine)
    {
        list($name, $value) = GenericHeader::splitHeaderLine($headerLine);
        // [$name, $value] = GenericHeader::splitHeaderLine($headerLine);

        // check to ensure proper header type for this factory
        if (strtolower($name) !== 'authorization') {
            throw new Exception\InvalidArgumentException(sprintf(
                'Invalid header line for Authorization string: "%s"',
                $name
            ));
        }

        // @todo implementation details
        return new static($value);
    }

    /** @param null|string $value */
    public function __construct($value = null)
    {
        if ($value !== null) {
            HeaderValue::assertValid($value);
            $this->value = $value;
        }
    }

    /** @return string */
    public function getFieldName()
    {
        return 'Authorization';
    }

    /** @return string */
    public function getFieldValue()
    {
        return (string) $this->value;
    }

    /** @return string */
    public function toString()
    {
        return 'Authorization: ' . $this->getFieldValue();
    }
}
