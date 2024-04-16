<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cameras;
use App\Models\User;


class CamTest extends TestCase
{
    use RefreshDatabase;
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_index(): void
    {
        // // Create a non-admin user
        // $user = User::factory()->create([
        //     'role' => 'user',
        // ]);

        // // Log in as the non-admin user
        // $this->actingAs($user);

        // // Attempt to access the cameras.index route
        // $response = $this->get(route('cameras.index'));

        // // Assert that the user is redirected to the login page
        // $response->assertRedirect(route('login'));

        // // Log out the non-admin user
        // $this->post(route('logout'));

        // // Create an admin user
        // $admin = User::factory()->create([
        //     'role' => 'admin',
        // ]);

        // // Log in as the admin user
        // $this->actingAs($admin);

        // // Access the cameras.index route
        // $response = $this->get(route('cameras.index'));

        // // Assert that the admin user is able to access the route
        // $response->assertStatus(200);

    }
}
