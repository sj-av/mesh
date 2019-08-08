<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;

class CategoryTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */
    public function it_can_see_list_of_categories()
    {

        factory(Category::class, 2)->create();

        $this->getJson('/api/categories/list')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id', 'name'
                ]
            ]);
    }

    /** @test */
    public function it_can_see_valid_children()
    {
        $categories = [
            ['id' => 1, 'name' => 'TV & Home Theather'],
            ['id' => 2, 'name' => 'Computers', 'children' => [
                ['id' => 3, 'name' => 'Laptops'],
            ]],
        ];

        Category::buildTree($categories);

        $parent_category = Category::find(2);
        $child_category = Category::find(3);

        $this->assertEquals($parent_category->toArray(), $child_category->getAncestors()->first()->toArray());
    }
    /** @test */
    public function it_can_retrieve_category_by_id()
    {
        factory(Category::class)->create();
        $this->getJson('/api/category/1')
            ->assertStatus(200)
            ->assertJsonStructure(['id', 'name']);
    }
}
