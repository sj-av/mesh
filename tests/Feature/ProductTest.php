<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_can_get_products_by_category_id()
    {
        factory(Product::class)->create();

        $this->getJson('/api/products/1')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'description', 'image_url']
            ])
            ->assertJsonCount(1);
    }

    /** @test */
    public function it_can_get_product_data()
    {

        $product_data = [
            'name' => 'My Product',
            'description' => 'It is mine',
            'image_url' => 'http://example.com/image.png'
        ];

        factory(Product::class)->create($product_data);

        $this->getJson('/api/product/1')
            ->assertStatus(200)
            ->assertJsonStructure([
                'id', 'name', 'description', 'image_url'
            ])
            ->assertJsonFragment($product_data);
    }

    /** @test */
    public function it_can_update_product_data()
    {
        factory(Product::class)->create(['name' => 'iPhone']);

        $this->postJson('/api/product/1', [
            'name' => 'Android',
            'description' => 'It is an android phone',
            'category_id' => 1
        ])->assertStatus(200);
    }

    /** @test */
    public function it_can_make_product_validation_on_save()
    {
        factory(Product::class)->create(['name' => 'iPhone']);

        $this->postJson('/api/product/1', [
            'name' => 'Android'
        ])->assertStatus(422);
    }
}
