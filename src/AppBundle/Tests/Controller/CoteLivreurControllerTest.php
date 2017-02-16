<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoteLivreurControllerTest extends WebTestCase
{
    public function testListeproduit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ListeProduit');
    }

}
