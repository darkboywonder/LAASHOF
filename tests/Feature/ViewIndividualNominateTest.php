<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ViewIndividualNominateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_the_individual_nomination_form()
    {
        $response = $this->get(route('nominate.individual.create'));

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('Nominate/Individual/Create'));
    }
}
