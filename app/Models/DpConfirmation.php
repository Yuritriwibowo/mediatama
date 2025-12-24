<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DpConfirmation extends Model
{
    protected $fillable = [
        'customer_name',
        'total_amount',
        'dp_amount',
        'status',
        'note'
    ];
}

