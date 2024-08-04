<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $dates = ['invoice_date', 'due_date'];

    protected $fillable = [
        'invoice_number', 'client_id', 'client_name', 'client_address', 'invoice_date', 'due_date', 'total_amount'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
