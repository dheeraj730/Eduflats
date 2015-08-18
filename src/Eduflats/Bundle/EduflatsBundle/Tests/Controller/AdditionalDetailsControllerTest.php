<?php

namespace Eduflats\Bundle\EduflatsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdditionalDetailsControllerTest extends WebTestCase
{
    public function testAddcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addCategory');
    }

    public function testAddoption()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addOption');
    }

}
