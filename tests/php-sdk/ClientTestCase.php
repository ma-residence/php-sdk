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
            'http://localhost:8000',
            '5b3292bc-6ba2-11e6-a006-cb89fb807f53_5ydgdr8bn1s8808s8gwoos440kgc0cs0wco0cc0gk0g0sggccw',
            '5twhnka6vckc84cowkk8wgwkwsw4owkgc8844gw00wsccsc804'
        );
    }

    public function tearDown()
    {
        $this->mrClient->auth()->logout();
    }
}
