<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    public function testUsersCreatedSuccessfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ];

        $response = $this->post(route('users.store'), $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('users', $data);
    }
}
