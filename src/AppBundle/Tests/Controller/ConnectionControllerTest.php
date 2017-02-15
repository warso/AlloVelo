<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnectionControllerTest extends WebTestCase
{
    public function testConnection()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Connection');
    }

}
