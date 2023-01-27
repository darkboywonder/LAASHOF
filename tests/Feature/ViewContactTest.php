<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ViewContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_contact_form()
    {
        $response = $this->get(route('contact.create'));

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('Contact'));
    }
}
