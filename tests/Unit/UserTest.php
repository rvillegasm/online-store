<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * User Login Test example.
     *
     * @return void
     */
    public function testUserAuthTest()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'any-password-available'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }
}
