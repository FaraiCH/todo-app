<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_auth(): void
    {
        //Test to see if page is not open
        $response = $this->get('/tasks');

        $response->assertStatus(302);
    }

    public function test_task_model() : void
    {
        // Check if task is being created successfully
        $task = Task::factory()->create();

        $this->assertModelExists($task);
    }

}
