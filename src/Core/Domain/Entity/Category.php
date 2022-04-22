<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodMagicsTrait;
use Core\Domain\Exceptions\EntityValidationException;

class Category
{
    use MethodMagicsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = ''): void
    {
        $this->name = $name;
        $this->description = $description;

        $this->validate();
    }

    /** @throws EntityValidationException */
    public function validate(): void
    {
        if (empty($this->name) || strlen($this->name) <= 5 || strlen($this->name) > 255) {
            throw new EntityValidationException(message: "Name is invalid.");
        }

        var_dump($this->description != '');
        if ($this->description !== '' && (strlen($this->description) > 255 || strlen($this->description) <= 5)) {
            throw new EntityValidationException(message: "Description is invalid.");
        }
    }
}