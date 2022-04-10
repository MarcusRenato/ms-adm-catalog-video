<?php

declare(strict_types=1);

namespace Core\Domain\Entity\Traits;

use Core\Domain\Exceptions\PropertyNotFoundException;

trait MethodMagicsTrait
{
    /** @throws PropertyNotFoundException*/
    public function __get(string $name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        }

        $className = get_class($this);

        throw new PropertyNotFoundException($name, $className);
    }
}