<?php

namespace Tests\Feature\Birthday;

use Tests\TestCase;

class ResourceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $jsonData = json_decode(file_get_contents(storage_path('app/birthdays.json')), true);
        $response = $this->get('/api/birthday');

        $response->assertStatus(200);
        $response->assertJson($jsonData);
    }
}
