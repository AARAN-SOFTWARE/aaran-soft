<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function test_category_table(): void
    {
        $category = Category::factory()->create();

        $this->assertEquals('Category', actual: $category->vname);
        $this->assertEquals('1', actual: $category->active_id);


    }
}
