<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task()
    {
        //Giả lập 1 request POST gửi tới
        $response = $this->postJson('/api/tasks', [
            'title' => 'Learn CI/CD',
        ]);

        //Kiểm tra HTTP Status, khác 201 => fail
        $response->assertStatus(201);

        //Kiểm tra dữ liệu trong DB, không tồn tại record nào có title = "Learn CI/CD" => fail
        $this->assertDatabaseHas('tasks', [
            'title' => 'Learn CI/CD',
        ]);
    }
}
