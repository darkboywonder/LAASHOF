<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamNomineeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nominator.first_name' => 'required|string',
            'nominator.last_name' => 'required|string',
            'nominator.phone' => 'required|string',
            'nominator.email' => 'required|email:unique',
            'nominator.address' => 'required|string',
            'nominator.city' => 'required|string',
            'nominator.state' => 'required|string',
            'nominator.zip' => 'required|string',
        ];
    }
}