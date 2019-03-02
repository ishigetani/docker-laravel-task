<?php

namespace Tests\Feature;

use Tests\TestCase;

class TopTest extends TestCase
{
    // Topページがアクセス可能なこと
    public function testStatusCode()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    // Taskという文字があること
    public function testBody()
    {
        $response = $this->get('/');
        $response->assertSeeText('Task');
    }
}
