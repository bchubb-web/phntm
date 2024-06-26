<?php

namespace bchubbweb\phntm\Routing;

use Stringable;
use bchubbweb\phntm\Routing\ParameterTypeException;
use bchubbweb\phntm\Phntm;

/**
 * DynamicParameter class
 *
 * Used to create dynamic parameters to be passed into a page
 */
class DynamicParameter implements Stringable
{
    public mixed $value;

    public function __construct(mixed $value, string $type)
    {
        $this->setType($value, $type);
        $this->value = $value;
        Phntm::Profile()->flag('Built dynamic parameter with value ' . $value . ' and type ' . $type);
    }

    /**
     * Set the type of the dynamic parameter
     *
     * @param mixed &$value
     * @param string $type
     *
     * @return void
     */
    protected function setType(mixed &$value, string $type): void
    {
        $stringToType = json_decode($value) ?? $value;
        $stringTypes = [
            'boolean' => 'bool',
            'integer' => 'int',
            'double' => 'float',
            'string' => 'string',
            'array' => 'array',
            'object' => 'object',
            'resource' => 'resource',
            'NULL' => 'null',
        ];
        if (array_key_exists(gettype($stringToType), $stringTypes)) {
            $decodedType = $stringTypes[gettype($stringToType)];
        }       
        if ($decodedType !== $type) {
            throw new ParameterTypeException("type error: dynamic parameter {$value} with type {$decodedType} does not match type {$type}.");
        }

        settype($value, $type);
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

}
