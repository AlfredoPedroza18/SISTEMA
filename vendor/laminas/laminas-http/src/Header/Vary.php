<?php

namespace Laminas\Http\Header;

use function strtolower;

/**
 * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.44
 *
 * @throws Exception\InvalidArgumentException
 */
class Vary implements HeaderInterface
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
        if (strtolower($name) !== 'vary') {
            throw new Exception\InvalidArgumentException('Invalid header line for Vary string: "' . $name . '"');
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
        return 'Vary';
    }

    /** @return string */
    public function getFieldValue()
    {
        return (string) $this->value;
    }

    /** @return string */
    public function toString()
    {
        return 'Vary: ' . $this->getFieldValue();
    }
}
