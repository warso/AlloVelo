<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionClientControllerTest extends WebTestCase
{
    public function testInscriptionclient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/inscriptionClient');
    }

    public function testConnexionclient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/connexionClient');
    }

    public function testDeconnexionclient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deconnexionClient');
    }

}
