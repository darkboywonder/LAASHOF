<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ViewTeamNominationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_the_team_nomination_form()
    {
        $response = $this->get(route('nominate.team.create'));

        $response->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('Nominate/Team/Create'));
    }
}
