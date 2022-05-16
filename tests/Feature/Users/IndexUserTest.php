<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class IndexUserTest extends TestCase
{
    use RefreshDatabase;

    public function testRouteIndexExist(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertOk();
    }

    public function testRouteIndexCanViewUsers(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.index'));
        $response->assertOk();
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
        $response->assertSee($user->name);
        $response->assertSee($user->email);
        $response->assertSee($user->status);
    }
}
