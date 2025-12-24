<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional jika default "orders")
     */
    protected $table = 'orders';

    /**
     * Field yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'total_price',
        'dp_amount',
        'status',
        'order_source',     // website / whatsapp
        'payment_proof',    // path bukti transfer
    ];

    /**
     * Cast tipe data
     */
    protected $casts = [
        'total_price' => 'integer',
        'dp_amount'   => 'integer',
    ];

    /**
     * ===============================
     * RELATION: ORDER → ORDER ITEMS
     * ===============================
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    /**
     * ===============================
     * HELPER: FORMAT ID ORDER
     * ORD-00001
     * ===============================
     */
    public function getOrderCodeAttribute()
    {
        return 'ORD-' . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    /**
     * ===============================
     * HELPER: STATUS LABEL
     * ===============================
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'pending'   => 'Pending',
            'confirmed' => 'DP Confirmed',
            'paid'      => 'Lunas',
            default     => ucfirst($this->status),
        };
    }

    /**
     * ===============================
     * HELPER: CEK DP SAH
     * ===============================
     */
    public function isDpValid()
    {
        return $this->dp_amount == ($this->total_price * 0.5);
    }

    /**
     * ===============================
     * HELPER: CEK LUNAS
     * ===============================
     */
    public function isPaid()
    {
        return $this->status === 'paid';
    }
}
