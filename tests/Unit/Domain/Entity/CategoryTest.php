<?php

declare(strict_types=1);

namespace Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testAttributes(): void
    {
        $category = new Category(
            id: '',
            name: 'New Cat',
            description: 'New Desc',
            isActive: true
        );

        $this->assertEquals(expected: 'New Cat', actual: $category->name);
        $this->assertEquals(expected: 'New Desc', actual: $category->description);
        $this->assertTrue($category->isActive);
    }
}