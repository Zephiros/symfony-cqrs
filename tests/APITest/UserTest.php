<?php

namespace APITest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', 'http://localhost:8000/api/users/', [], [], [
            'HTTP_ACCEPT' => 'application/json',
            'HTTP_CONTENT_TYPE' => 'application/json'
        ]);

        $this->assertResponseIsSuccessful();
    }
}
