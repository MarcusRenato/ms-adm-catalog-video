<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodMagicsTrait;

class Category
{
    use MethodMagicsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    ) {
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }
}