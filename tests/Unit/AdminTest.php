<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Middleware\Authentication;
use Illuminate\Http\Request;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Admin Login Test example.
     *
     * @return void
     */
    public function testAdminAuthTest()
    {
        $user = factory(User::class)->make(['role' => 'admin']);

        $this->actingAs($user);

        $request = Request::create('/admin/order', 'GET');

        $middleware = new Authentication;

        $response = $middleware->handle($request, function () {}, 'admin');

        $this->assertNotNull($response);
        
    }
}
