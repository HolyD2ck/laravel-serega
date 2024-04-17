<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cameras;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CartControllerTest extends TestCase
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
     * Test the addToCart method.
     *
     * @return void
     */
    public function testAddToCart()
    {
        $camera = Cameras::factory()->create();

        $response = $this->actingAs($this->adminUser)->get('/cart/add/camera/' . $camera->id);

        $response->assertRedirect('/');
        $this->assertNotEmpty(session('cart'));
    }

    /**
     * Test the removeFromCart method.
     *
     * @return void
     */
    public function testRemoveFromCart()
    {
        $camera = Cameras::factory()->create();

        // Add to cart first
        $this->actingAs($this->adminUser)->get('/cart/add/camera/' . $camera->id);

        $response = $this->actingAs($this->adminUser)->get('/cart/remove/' . $camera->id);

        $response->assertRedirect('/cart');
    }

    /**
     * Test the showCheckoutForm method.
     *
     * @return void
     */
    public function testShowCheckoutForm()
    {
        $camera = Cameras::factory()->create();


        $this->actingAs($this->adminUser)->get('/cart/add/camera/' . $camera->id);

        $response = $this->actingAs($this->adminUser)->get('/cart');

        $response->assertStatus(200);
    }


    /**
     * Test the submitCheckoutForm method.
     *
     * @return void
     */
    public function testSubmitCheckoutForm()
    {
        $camera = Cameras::factory()->create();

        // Add to cart first
        $this->actingAs($this->adminUser)->get('/cart/add/camera/' . $camera->id);

        $response = $this->actingAs($this->adminUser)->post('/checkout', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'address' => '123 Test St',
            'card_number' => '1234567812345678',
            'csv' => '123',
        ]);

        $response->assertRedirect('/cart');
    }
}
