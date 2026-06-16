<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'contract_id',
        'midtrans_order_id',
        'amount',
        'status'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}