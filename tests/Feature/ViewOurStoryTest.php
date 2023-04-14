<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ViewOurStoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_users_can_view_founders_message_page()
    {
        $response = $this->get(route('about.message'));

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('About/Message'));
    }
}
