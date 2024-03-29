<?php

namespace App\Tests\APITest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', 'http://localhost:5000/api/users/', [], [], [
            'HTTP_ACCEPT' => 'application/json',
            'HTTP_CONTENT_TYPE' => 'application/json'
        ]);

        $response = $client->getResponse();

        $this->assertResponseIsSuccessful();
    }
}
