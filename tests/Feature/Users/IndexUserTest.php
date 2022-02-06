<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class IndexUserTest extends TestCase
{
    use RefreshDatabase;

    public function testRouteIndexRedirectLoginForAuth()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)->get(route('users.update', $user->id));
        //dd($response);
        $response->assertOk();
    }
}
