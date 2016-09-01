<?php

namespace Tests\MR\SDK\Endpoint;

use Tests\MR\SDK\ClientTestCase;

class UserEndpointTest extends ClientTestCase
{
    public function testEndpoint()
    {
        $this->mrClient->auth()->loginWithCredentials('user.a@ma-residence.fr', 'password');

        $response = $this->mrClient->users()->get('me');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotNull($response->getData());
    }
}
