<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpConfirmation extends Model
{
    use HasFactory;

    protected $table = 'dp_confirmations';

    protected $fillable = [
        'customer_name',
        'order_source',
        'total_amount',
        'dp_amount',
        'nominal_transfer',
        'payment_proof',
        'status',
        'note',
    ];
}