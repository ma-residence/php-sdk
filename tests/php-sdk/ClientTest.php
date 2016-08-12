<?php

namespace Tests\MR\SDK;

use MR\SDK\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $mrClient;

    public function setUp()
    {
        $this->mrClient = new Client("http://localhost", "client_id", "client_secret");
    }

    public function test()
    {
        $this->assertInstanceOf(Client::class, $this->mrClient);
    }
}
