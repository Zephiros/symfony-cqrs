<?php

namespace App\Tests\APITest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = $this->createClient();
        $client->request('GET', 'http://localhost:5000/api/products/', [], [], [
            'HTTP_ACCEPT' => 'application/json',
            'HTTP_CONTENT_TYPE' => 'application/json'
        ]);

        $client->getResponse();

        $this->assertResponseIsSuccessful();
    }
}
