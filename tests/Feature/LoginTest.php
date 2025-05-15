<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test2@gmail.com',
            'password' => bcrypt('admin@admin.com'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@gmail.com',
            'password' => 'admin@admin.com',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/home');
    }
}
