<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function TestAuth()
    {
        // testing to see if the page is open
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }
}
