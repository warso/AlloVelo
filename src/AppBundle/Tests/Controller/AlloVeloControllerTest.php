<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlloVeloControllerTest extends WebTestCase
{
    public function testAccueil()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/accueil');
    }

}
