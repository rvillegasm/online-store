<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

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
        Session::start();
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'any-password-available'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }
}
