<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase; // Use database transactions to reset the database after each test

    /**
     * Test user registration.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'password' => 'password'
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302); // Check if registration redirects successfully
        $this->assertAuthenticated(); // Check if user is authenticated after registration
    }

    /**
     * Test user login.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(302); // Check if login redirects successfully
        $this->assertAuthenticatedAs($user); // Check if the logged in user matches the created user
    }

    /**
     * Test user logout.
     *
     * @return void
     */
    public function testUserLogout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302); // Check if logout redirects successfully
        $this->assertGuest(); // Check if user is not authenticated after logout
    }

    
}
