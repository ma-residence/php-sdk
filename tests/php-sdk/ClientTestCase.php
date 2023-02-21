<?php

namespace Tests\MR\SDK;

use MR\SDK\Client;
use PHPUnit\Framework\TestCase;

class ClientTestCase extends TestCase
{
    protected Client $mrClient;

    public function setUp(): void
    {
        // TODO: Find a way to test easily and have correct client id & secret
        $this->mrClient = new Client(
            'https://staging.api.ma-residence.fr',
            'c4ee8504-80d2-11e6-8f1f-9be34f73e493_4g8j1az05u2o8gog4c8k0kksk800ws84ks0o48k88gosg4wg0k',
            '4fd07cend9c084w0owk844wc4o4okwwoogg8s4k0ksocwos08k',
            'toto'
        );
    }

    public function test()
    {
        $this->mrClient->auth()->loginWithCredentials('user.a@ma-residence.fr', 'password');

        self::assert NotNull($this->mrClient->auth()->getAccessToken());
        self::assertTrue($this->mrClient->auth()->hasToken());
        self::assertTrue($this->mrClient->auth()->checkLifetime());
        self::assertEquals(200, $this->mrClient->me()->get()->getStatusCode());

        $this->mrClient->alerts();
        $this->mrClient->associations();
        $this->mrClient->categories();
        $this->mrClient->cityHalls();
        $this->mrClient->comments();
        $this->mrClient->groups();
        $this->mrClient->help();
        $this->mrClient->invitations();
        $this->mrClient->markets();
        $this->mrClient->me();
        $this->mrClient->members();
        $this->mrClient->news();
        $this->mrClient->places();
        $this->mrClient->profiles();
        $this->mrClient->publications();
        $this->mrClient->recommendations();
        $this->mrClient->request();
        $this->mrClient->roles();
        $this->mrClient->serviceWorkflows();
        $this->mrClient->services();
        $this->mrClient->shares();
        $this->mrClient->users();
    }

    public function tearDown(): void
    {
        $this->mrClient->auth()->logout();
    }
}
