<?php

namespace Eduflats\Bundle\EduflatsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testCreateadmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createAdmin');
    }

    public function testUpdateadmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateAdmin');
    }

    public function testDeleteadmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAdmin');
    }

}
