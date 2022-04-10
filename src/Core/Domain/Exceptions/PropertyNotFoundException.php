<?php

declare(strict_types=1);

namespace Core\Domain\Exceptions;

use Exception;

class PropertyNotFoundException extends Exception
{
    public function __construct(string $property, string $className)
    {
        parent::__construct(message: $this->createMessage($property, $className));
    }

    private function createMessage(string $property, string $className): string
    {
        return "Property {$property} nor found in {$className}.";
    }
}