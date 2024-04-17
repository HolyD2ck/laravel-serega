<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Videocameras;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VideocamerasControllerTest extends TestCase
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
        $response = $this->actingAs($this->adminUser)->get('/videocameras');

        $response->assertStatus(200);
    }

    /**
     * Test the create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->actingAs($this->adminUser)->get('/videocameras/create');

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

        $response = $this->actingAs($this->adminUser)->post('/videocameras', [
            'Модель' => 'New Model',
            'Производитель' => 'New Manufacturer',
            'Дата_Выпуска' => '2022-01-01',
            'Цена' => 1000,
            'Описание' => 'This is a new videocamera.',
            'Разрешение' => '1080p',
            'Wi_Fi_поддержка' => 1,
            'Bluetooth_поддержка' => 0,
            'Фото' => UploadedFile::fake()->image('new_videocamera.jpg'),
        ]);

        $response->assertRedirect('/videocameras');
    }

    /**
     * Test the show method.
     *
     * @return void
     */
    public function testShow()
    {
        $videocamera = Videocameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/videocameras/' . $videocamera->id);

        $response->assertStatus(200);
    }

    /**
     * Test the edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        $videocamera = Videocameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/videocameras/' . $videocamera->id . '/edit');

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

        $videocamera = Videocameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->put('/videocameras/' . $videocamera->id, [
            'Модель' => 'Updated Model',
            'Производитель' => 'Updated Manufacturer',
            'Дата_Выпуска' => '2022-01-01',
            'Цена' => 2000,
            'Описание' => 'This is an updated videocamera.',
            'Разрешение' => '4K',
            'Wi_Fi_поддержка' => 1,
            'Bluetooth_поддержка' => 1,
            'Фото' => UploadedFile::fake()->image('updated_videocamera.jpg'),
        ]);

        $response->assertRedirect('/videocameras');
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $videocamera = Videocameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->delete('/videocameras/' . $videocamera->id);

        $response->assertRedirect('/');
    }

    /**
     * Test the shop method.
     *
     * @return void
     */
    public function testShop()
    {
        $response = $this->get('/videocameras/shop');

        $response->assertStatus(200);
    }
}