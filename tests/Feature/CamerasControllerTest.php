<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cameras;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CamerasControllerTest extends TestCase
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
        $response = $this->actingAs($this->adminUser)->get('/cameras');

        $response->assertStatus(200);
    }

    /**
     * Test the create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->actingAs($this->adminUser)->get('/cameras/create');

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

        $response = $this->actingAs($this->adminUser)->post('/cameras', [
            'Модель' => 'New Model',
            'Производитель' => 'New Manufacturer',
            'Дата_Выпуска' => '2022-01-01',
            'Цена' => 1000,
            'Описание' => 'This is a new camera.',
            'Разрешение' => '1080p',
            'Wi_Fi_поддержка' => 1,
            'Bluetooth_поддержка' => 0,
            'Фото' => UploadedFile::fake()->image('new_camera.jpg'),
        ]);

        $response->assertRedirect('/cameras');
    }

    /**
     * Test the show method.
     *
     * @return void
     */
    public function testShow()
    {
        $camera = Cameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/cameras/' . $camera->id);

        $response->assertStatus(200);
    }

    /**
     * Test the edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        $camera = Cameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/cameras/' . $camera->id . '/edit');

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

        $camera = Cameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->put('/cameras/' . $camera->id, [
            'Модель' => 'Updated Model',
            'Производитель' => 'Updated Manufacturer',
            'Дата_Выпуска' => '2022-01-01',
            'Цена' => 2000,
            'Описание' => 'This is an updated camera.',
            'Разрешение' => '4K',
            'Wi_Fi_поддержка' => 1,
            'Bluetooth_поддержка' => 1,
            'Фото' => UploadedFile::fake()->image('updated_camera.jpg'),
        ]);

        $response->assertRedirect('/cameras');
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $camera = Cameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->delete('/cameras/' . $camera->id);

        $response->assertRedirect('/');
    }

    /**
     * Test the shop method.
     *
     * @return void
     */
    public function testShop()
    {
        $response = $this->get('/cameras/shop');

        $response->assertStatus(200);
    }
}
