<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlyersControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_one_can_visit_create_flyers_page()
    {
      $response = $this->get('flyers/create');
        $response->assertStatus(200);

    }
}
