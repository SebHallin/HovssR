<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    private $routeName = 'auth.login.authenticate';

    public function testSuccessfulAuthentication()
    {
        $postData = [
            'username' => 'tmpBlaha',
            'password' => 'makeWithThaFactoryLater',
        ];

        $response = $this->post(route($this->routeName, $postData));
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function testRequireUsername()
    {
        $postData = [
            'password' => 'Timbeeeeerrrrr'
        ];

        $response = $this->post(route($this->routeName, $postData));
        $response->assertSessionHas('errors');
        $this->assertGuest();
    }
}
