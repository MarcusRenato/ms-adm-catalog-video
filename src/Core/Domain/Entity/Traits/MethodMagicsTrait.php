<?php

declare(strict_types=1);

namespace Core\Domain\Entity\Traits;

use Exception;

trait MethodMagicsTrait
{
    /** @throws Exception */
    public function __get(string $name)
    {
        if ($this->{$name}) {
            return $this->{$name};
        }

        $clasName = get_class($this);

        throw new Exception(message: "Property {$name} nor found in {$clasName}.");
    }
}