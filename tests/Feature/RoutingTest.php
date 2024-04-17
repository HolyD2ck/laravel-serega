<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;

class RoutingTest extends TestCase
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
     * Test the index page.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the about page.
     *
     * @return void
     */
    public function testAboutPage()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    /**
     * Test the contacts page.
     *
     * @return void
     */
    public function testContactsPage()
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
    }

    /**
     * Test the home page.
     *
     * @return void
     */

    /**
     * Test the shop page for cameras.
     *
     * @return void
     */
    public function testCamerasShopPage()
    {
        $response = $this->get('/cameras/shop');

        $response->assertStatus(200);
    }

    /**
     * Test the shop page for videocameras.
     *
     * @return void
     */
    public function testVideocamerasShopPage()
    {
        $response = $this->get('/videocameras/shop');

        $response->assertStatus(200);
    }

    /**
     * Test the shop page for accessories.
     *
     * @return void
     */
    public function testAccessoriesShopPage()
    {
        $response = $this->get('/accessories/shop');

        $response->assertStatus(200);
    }

    /**
     * Test the cart page.
     *
     * @return void
     */
    public function testCartPage()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }

    /**
     * Test the admin page.
     *
     * @return void
     */
    public function testAdminPage()
    {
        $response = $this->actingAs($this->adminUser)->get('/admin');

        $response->assertStatus(200);
    }

    /**
     * Test the cameras resource with middleware.
     *
     * @return void
     */
    public function testCamerasResourceWithMiddleware()
    {
        $response = $this->actingAs($this->adminUser)->get('/cameras');

        $response->assertStatus(200);
    }

    /**
     * Test the videocameras resource with middleware.
     *
     * @return void
     */
    public function testVideocamerasResourceWithMiddleware()
    {
        $response = $this->actingAs($this->adminUser)->get('/videocameras');

        $response->assertStatus(200);
    }

    /**
     * Test the accessories resource with middleware.
     *
     * @return void
     */
    public function testAccessoriesResourceWithMiddleware()
    {
        $response = $this->actingAs($this->adminUser)->get('/accessories');

        $response->assertStatus(200);
    }

    /**
     * Test the users resource with middleware.
     *
     * @return void
     */
    public function testUsersResourceWithMiddleware()
    {
        $response = $this->actingAs($this->adminUser)->get('/users');

        $response->assertStatus(200);
    }
}
