<?php

namespace Tests\Feature\Api\Controller;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }
    public function test_index_categories()
    {
        Category::factory(4)->create();

        $response = $this->getJson('/api/categories');
        $response->assertSuccessful();

        $response->assertJsonCount(4);
    }
    public function test_create_new_category()
    {
        $data = [
            'name' => 'books',
            'description' => 'Categories for books',
        ];
        $response = $this->postJson('/api/categories',$data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('categories',$data);
    }
    public function test_update_categories()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => 'books',
            'description' => 'Categories for books',
        ];
        $response = $this->patchJson("/api/categories/$category->id", $data);
        $response->assertSuccessful();
    }
    public function test_show_product()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/categories/$category->id");

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
    }
    public function test_delete_product()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/$category->id");
        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $this->assertDeleted($category);
    }

}