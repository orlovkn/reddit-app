<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    public function test_that_list_of_tasks_is_not_empty()
    {
        $response = $this->get('api/tasks');

        $response->assertStatus(200);
    }
}
