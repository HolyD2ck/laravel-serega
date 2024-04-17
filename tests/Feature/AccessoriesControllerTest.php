<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Accessories;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AccessoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'phone' => '1234567890',
            'avatar' => 'admin.jpg',
            'role' => 'admin',
        ]);
    }

    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->actingAs($this->adminUser)->get('/accessories');

        $response->assertStatus(200);
    }

    /**
     * Test the create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->actingAs($this->adminUser)->get('/accessories/create');

        $response->assertStatus(200);
    }

    /**
     * Test the store method.
     *
     * @return void
     */
    public function testStore()
    {
        Storage::fake('public');

        $response = $this->actingAs($this->adminUser)->post('/accessories', [
            "Название" => "New Accessory",
            "Цена" => 1000,
            "Описание" => "This is a new accessory.",
            "Фото" => UploadedFile::fake()->image('new_accessory.jpg'),
            "Производитель" => "New Manufacturer",
            "Материал" => "New Material",
            "Цвет" => "New Color",
            "Страна_Производства" => "New Country",
            "Гарантия" => 1,
            "Дата_Выпуска" => "2022-01-01",
        ]);

        $response->assertRedirect('/accessories');
    }

    /**
     * Test the show method.
     *
     * @return void
     */
    public function testShow()
    {
        $accessory = Accessories::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/accessories/' . $accessory->id);

        $response->assertStatus(200);
    }

    /**
     * Test the edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        $accessory = Accessories::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/accessories/' . $accessory->id . '/edit');

        $response->assertStatus(200);
    }

    /**
     * Test the update method.
     *
     * @return void
     */
    public function testUpdate()
    {
        Storage::fake('public');

        $accessory = Accessories::factory()->create();

        $response = $this->actingAs($this->adminUser)->put('/accessories/' . $accessory->id, [
            "Название" => "Updated Accessory",
            "Цена" => 2000,
            "Описание" => "This is an updated accessory.",
            "Фото" => UploadedFile::fake()->image('updated_accessory.jpg'),
            "Производитель" => "Updated Manufacturer",
            "Материал" => "Updated Material",
            "Цвет" => "Updated Color",
            "Страна_Производства" => "Updated Country",
            "Гарантия" => 0,
            "Дата_Выпуска" => "2022-01-01",
        ]);

        $response->assertRedirect('/accessories');
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $accessory = Accessories::factory()->create();

        $response = $this->actingAs($this->adminUser)->delete('/accessories/' . $accessory->id);

        $response->assertRedirect('/');
    }

    /**
     * Test the shop method.
     *
     * @return void
     */
    public function testShop()
    {
        $response = $this->get('/accessories/shop');

        $response->assertStatus(200);
    }
}