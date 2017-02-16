<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoteClientControleurControllerTest extends WebTestCase
{
    public function testCreercommande()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/creerCommande');
    }

}
