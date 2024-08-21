<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase {

    use RefreshDatabase;

    public function test_new_users_can_register(): void {
        $response = $this->post('/register', [
            'name'                 => 'Test User',
            'first_name'           => 'Test User',
            'email'                => 'test@example.com',
            'username'             => 'test_user',
            'password'             => 'password',
            'passwordConfirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }
}
