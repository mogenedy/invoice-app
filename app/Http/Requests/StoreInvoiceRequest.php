<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_number' => 'required|unique:invoices',
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'items.*.description' => 'required',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price_per_unit' => 'required|numeric|min:0',
        ];
    }
}
