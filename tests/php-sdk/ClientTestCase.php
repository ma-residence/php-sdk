<?php

namespace Tests\MR\SDK;

use MR\SDK\Client;

class ClientTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    protected $mrClient;

    public function setUp()
    {
        // TODO: Find a way to test easily and have correct client id & secret
        $this->mrClient = new Client(
            'http://api.ma-residence.fr',
            'c4ee8504-80d2-11e6-8f1f-9be34f73e493_4g8j1az05u2o8gog4c8k0kksk800ws84ks0o48k88gosg4wg0k',
            '4fd07cend9c084w0owk844wc4o4okwwoogg8s4k0ksocwos08k'
        );
    }

    public function test()
    {
        $this->mrClient->auth()->loginWithCredentials('user.a@ma-residence.fr', 'password');

        $this->assertNotNull($this->mrClient->auth()->getAccessToken());
        $this->assertTrue($this->mrClient->auth()->hasToken());
        $this->assertTrue($this->mrClient->auth()->checkLifetime());
        $this->assertEquals(200, $this->mrClient->me()->get()->getStatusCode());
    }

    public function tearDown()
    {
        $this->mrClient->auth()->logout();
    }
}
