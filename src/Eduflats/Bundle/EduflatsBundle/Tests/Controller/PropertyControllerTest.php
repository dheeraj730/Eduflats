<?php

namespace Eduflats\Bundle\EduflatsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PropertyControllerTest extends WebTestCase
{
    public function testCreateproperty()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createProperty');
    }

    public function testUpdateproperty()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateProperty');
    }

    public function testDeleteproperty()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteProperty');
    }

}
