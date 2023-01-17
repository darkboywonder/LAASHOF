<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_visit_the_home_page()
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('Home'));
    }
}
