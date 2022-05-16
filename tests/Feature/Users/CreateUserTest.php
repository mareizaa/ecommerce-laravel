<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function testRouteCreateExist()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertOk();
        $response->assertViewIs('users.create');
    }

    public function testDisplayFormCreateUsers()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertOk();
        $response->assertViewIs('users.create');
        $response->assertSee($user->name);
        $response->assertSee($user->email);
        $response->assertSee($user->password_hash);
    }
}
