<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ViewFoundingMembersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_users_can_view_our_story_page()
    {
        $response = $this->get(route('about.founding-members'));

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('About/FoundingMembers'));
    }
}
