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

        $response->assertStatus(200);
    }
}
