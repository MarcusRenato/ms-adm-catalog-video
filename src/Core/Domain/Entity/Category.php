<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodMagicsTrait;
use Core\Domain\Exceptions\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

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
        DomainValidation::notNull(value: $this->name, exceptionMessage: 'Name is invalid.');
        DomainValidation::stringMaxLength(value: $this->name, exceptionMessage: 'Name is invalid.');
        DomainValidation::stringMinLength(value: $this->name, minLength: 5, exceptionMessage: 'Name is invalid.');

        DomainValidation::stringCanNullAndMaxLength(
            value: $this->description,
            exceptionMessage: "Description is invalid."
        );

        DomainValidation::stringCanNullAndMinLength(
            value: $this->description,
            minLength: 5,
            exceptionMessage: "Description is invalid."
        );
    }
}