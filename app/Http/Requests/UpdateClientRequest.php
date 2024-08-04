<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $this->client->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ];
    }
}
