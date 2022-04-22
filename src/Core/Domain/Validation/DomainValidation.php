<?php

declare(strict_types=1);

namespace Core\Domain\Validation;

use Core\Domain\Exceptions\EntityValidationException;

class DomainValidation
{
    /** @throws EntityValidationException */
    public static function notNull(?string $value, ?string $exceptionMessage = null): void
    {
        if (empty($value)) {
            throw new EntityValidationException(message: $exceptionMessage ?? 'Field cannot be empty.');
        }
    }

    /** @throws EntityValidationException */
    public static function stringMaxLength(string $value, int $maxLength = 255, ?string $exceptionMessage = null): void
    {
        if (strlen($value) >= $maxLength) {
            throw new EntityValidationException(message: $exceptionMessage ?? 'Very big field.');
        }
    }

    /** @throws EntityValidationException */
    public static function stringMinLength(string $value, int $minLength = 2, ?string $exceptionMessage = null)
    {
        if (strlen($value) <= $minLength) {
            throw new EntityValidationException(message: $exceptionMessage ?? 'Very small field.');
        }
    }

    /** @throws EntityValidationException */
    public static function stringCanNullAndMaxLength(string $value = '', int $maxLength = 255, ?string $exceptionMessage = null)
    {
        if (!empty($value) && strlen($value) >= $maxLength) {
            throw new EntityValidationException(message: $exceptionMessage ?? 'Very big field.');
        }
    }

    /** @throws EntityValidationException */
    public static function stringCanNullAndMinLength(string $value = '', int $minLength = 2, ?string $exceptionMessage = null)
    {
        if (!empty($value) && strlen($value) <= $minLength) {
            throw new EntityValidationException(message: $exceptionMessage ?? 'Very small field.');
        }
    }
}