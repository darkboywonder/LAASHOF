<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNomineeRequest extends FormRequest
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
            'nominee.first_name' => 'required|string',
            'nominee.last_name' => 'required|string',
            'nominee.birthday' => 'required|string',
            'nominee.gender' => 'required|string',
            'nominee.phone' => 'required|string',
            'nominee.email' => 'required|email',
            'nominee.address' => 'required|string',
            'nominee.city' => 'required|string',
            'nominee.state' => 'required|string',
            'nominee.zip' => 'required|string',
            'nominee.category' => 'required|string',
            'nominee.achievements' => 'required|array',
            'nominee.attending' => 'required|string',
            'nominee.deceased' => 'required_if:nominee.attending,no|string|nullable',
            'nominator.first_name' => 'required|string',
            'nominator.last_name' => 'required|string',
            'nominator.phone' => 'required|string',
            'nominator.email' => 'required|email:unique',
            'nominator.address' => 'required|string',
            'nominator.city' => 'required|string',
            'nominator.state' => 'required|string',
            'nominator.zip' => 'required|string',
            'representative_attending' => 'required_if:nominee.attending,no|string|nullable'
        ];
    }
}
