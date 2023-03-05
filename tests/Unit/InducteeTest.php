<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Nominee;
use App\Models\Inductee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InducteeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function Inductee_returns_true_if_nominee_doesn_exist_as_inductee()
    {
        $nominee = Nominee::factory()->create();

        $this->assertTrue(Inductee::doesntExist($nominee));
    }

    /** @test */
    public function Inductee_returns_false_if_nominee_doesn_exist_as_inductee()
    {
        $nominee = Nominee::factory()->create();
        Inductee::factory()->create(array_merge($nominee->toArray(), ['class' => '2023']));

        $this->assertFalse(Inductee::doesntExist($nominee));
    }
}
