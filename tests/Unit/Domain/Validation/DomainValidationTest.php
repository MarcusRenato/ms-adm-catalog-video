<?php

declare(strict_types=1);

namespace Unit\Domain\Validation;

use Core\Domain\Exceptions\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;

class DomainValidationTest extends TestCase
{
    public function testValueIsNotNullWithCustomMessageException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectErrorMessage('Custom Message');

        DomainValidation::notNull(value: '', exceptionMessage: 'Custom Message');
    }

    public function testStringMaxLengthWithCustomMessageException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectErrorMessage('Custom Message Max Length');

        DomainValidation::stringMaxLength(value: 'value big', maxLength: 5, exceptionMessage: 'Custom Message Max Length');
    }

    public function testStringMinLengthWithCustomMessageException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectErrorMessage('Custom Message Min Length');

        DomainValidation::stringMinLength(value: 'min', minLength: 3, exceptionMessage: 'Custom Message Min Length');
    }

    public function testValueCanNullAndMaxLengthWithCustomMessageException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectErrorMessage('Custom Message null and max Length');

        DomainValidation::stringCanNullAndMaxLength(value: 'Big String', maxLength: 3, exceptionMessage: 'Custom Message null and max Length');
    }

    public function testValueCanNullAndMinLengthWithCustomMessageException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectErrorMessage('Custom Message null and min Length');

        DomainValidation::stringCanNullAndMinLength(value: 'm', minLength: 3, exceptionMessage: 'Custom Message null and min Length');
    }
}