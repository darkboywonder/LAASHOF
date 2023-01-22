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
            'nominee.phone' => 'required_if:nominee.deceased,no|string|nullable',
            'nominee.email' => 'required_if:nominee.deceased,no|email|nullable',
            'nominee.address' => 'required_if:nominee.deceased,no|string|nullable',
            'nominee.city' => 'required_if:nominee.deceased,no|string|nullable',
            'nominee.state' => 'required_if:nominee.deceased,no|string|nullable',
            'nominee.zip' => 'required_if:nominee.deceased,no|string|nullable',
            'nominee.category' => 'required|string',
            'nominee.deceased' => 'required|string',
            'nominator.first_name' => 'required|string',
            'nominator.last_name' => 'required|string',
            'nominator.phone' => 'required|string',
            'nominator.email' => 'required|email:unique',
            'nominator.address' => 'required|string',
            'nominator.city' => 'required|string',
            'nominator.state' => 'required|string',
            'nominator.zip' => 'required|string',
            'relative.first_name' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.last_name' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.email' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.phone' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.address' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.city' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.state' => 'required_if:nominee.deceased,yes|string|nullable',
            'relative.zip' => 'required_if:nominee.deceased,yes|string|nullable',
        ];
    }
}
