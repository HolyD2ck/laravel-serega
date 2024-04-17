<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserControllerTest extends TestCase
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
        $response = $this->actingAs($this->adminUser)->get('/users');

        $response->assertStatus(200);
    }

    /**
     * Test the create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->actingAs($this->adminUser)->get('/users/create');

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

        $response = $this->actingAs($this->adminUser)->post('/users', [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'passwordw',
            'phone' => '1234567890',
            'role' => 'admin',
            'avatar' => UploadedFile::fake()->image('new_user.jpg'),
        ]);

        $response->assertRedirect('/');
    }

    /**
     * Test the show method.
     *
     * @return void
     */
    public function testShow()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/users/' . $user->id);

        $response->assertStatus(200);
    }

    /**
     * Test the edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/users/' . $user->id . '/edit');

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

        $user = User::factory()->create();

        $response = $this->actingAs($this->adminUser)->put('/users/' . $user->id, [
            'name' => 'Updated User',
            'email' => 'updateduser@example.com',
            'password' => 'password',
            'password_confirmation' => 'passwordw',
            'phone' => '2345678901',
            'role' => 'user',
            'avatar' => UploadedFile::fake()->image('updated_user.jpg'),
        ]);

        $response->assertRedirect('/');
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function destroy(User $user, $id)
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->adminUser)->delete('/users/' . $user->id, ['id' => $user->id]);

        $response->assertRedirect('/users');
    }

}