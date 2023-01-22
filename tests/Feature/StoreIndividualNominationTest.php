<?php

namespace Tests\Feature;

use App\Models\Nominee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreIndividualNominationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function nominee_first_name_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'first_name' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.first_name');
    }

    /** @test */
    public function nominee_last_name_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'last_name' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.last_name');
    }

    /** @test */
    public function nominee_birthday_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'birthday' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.birthday');
    }

    /** @test */
    public function nominee_gender_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'gender' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.gender');
    }

    /** @test */
    public function nominee_phone_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'phone' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.phone');
    }

    /** @test */
    public function nominee_email_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'email' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.email');
    }

    /** @test */
    public function nominee_email_is_an_actual_email_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'email' => 'shawn@',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.email');
    }

    /** @test */
    public function nominee_address_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'address' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.address');
    }

    /** @test */
    public function nominee_city_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'city' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.city');
    }


    /** @test */
    public function nominee_state_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'state' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.state');
    }

    /** @test */
    public function nominee_zip_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'zip' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.zip');
    }

    /** @test */
    public function nominee_category_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominee' => [
                'category' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominee.category');
    }

    /** @test */
    public function nominator_first_name_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'first_name' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.first_name');
    }

    /** @test */
    public function nominator_last_name_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'last_name' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.last_name');
    }

    /** @test */
    public function nominator_phone_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'phone' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.phone');
    }

    /** @test */
    public function nominator_email_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'email' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.email');
    }

    /** @test */
    public function nominator_email_is_an_actual_email_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'email' => 'shawn@',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.email');
    }

    /** @test */
    public function nominator_address_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'address' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.address');
    }

    /** @test */
    public function nominator_city_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'city' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.city');
    }


    /** @test */
    public function nominator_state_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'state' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.state');
    }

    /** @test */
    public function nominator_zip_is_required_for_nominee_creation()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams([
            'nominator' => [
                'zip' => '',
            ]
        ]));

        $response->assertRedirect();
        $response->assertSessionHasErrors('nominator.zip');
    }

    /** @test */
    public function a_nominee_is_created_on_successful_submission()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams());

        $response->assertRedirect();
        $this->assertNotNull(Nominee::firstWhere('email', 'kento633@gmail.com'));
    }

    /** @test */
    public function a_nominator_is_created_and_associated_to_the_nominee_on_a_successful_submission()
    {
        $response = $this->post(route('nominate.individual.store'), $this->validParams());

        $nominee = Nominee::with('nominator')->firstWhere('email', 'kento633@gmail.com');
        $response->assertRedirect();
        $this->assertNotNull($nominee);
        $this->assertNotNull($nominee->nominator);
    }

    private function validParams($overrides = [])
    {
        return array_replace_recursive([
            'nominee' => [
                'first_name' => 'shawn',
                'last_name' => 'jones',
                'birthday' => '1984-04-02',
                'gender' => 'male',
                'phone' => '8592998999',
                'email' => 'kento633@gmail.com',
                'address' => '296 A Radcliffe Rd',
                'city' => 'Lexington',
                'state' => 'Ky',
                'zip' => '40505',
                'category' => 'athlete',
                'deceased' => 'no',
                'accomplishment_summary' => '',
            ],
            'nominator' => [
                'first_name' => 'William',
                'last_name' => 'Jones',
                'phone' => '6062998405',
                'email' => 'wj296@aol.com',
                'address' => '296 A Radcliffe Rd',
                'city' => 'Lexington',
                'state' => 'Ky',
                'zip' => '40505',
            ],
        ], $overrides);
    }
}
