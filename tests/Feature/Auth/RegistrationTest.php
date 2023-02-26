<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_a_pre_existing_user_can_register()
    {
        // @todo: remove test and functionality when we except public memberships
        $user = User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'phone' => '8592998999',
            'city' => 'Lexington',
            'state' => 'KY',
            'address' => '296 A Radcliffe Rd',
            'zip' => '40505',
            'email' => 'test@example.com',
        ]);

        $response = $this->post('/register', array_merge($user->toArray(), ['password' => 'password', 'password_confirmation' => 'password']));

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_a_public_new_user_can_not_register_pre_existing_email_doesnt_exist()
    {
        // @todo: remove test and functionality when we except public memberships
        $response = $this->post('/register', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'phone' => '8592998999',
            'city' => 'Lexington',
            'state' => 'KY',
            'address' => '296 A Radcliffe Rd',
            'zip' => '40505',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }
}
