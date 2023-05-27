<?php

namespace App\Models;

use App\Models\Inspection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'order_code',
        'queue_number',
        'book_date',
        'total_tire',
        'size_tire',
        'delivery_tire',
        'detail_order',
        'pict_down_payment',
        'price_down_payment',
        'status_dp',
        'pict_full_payment',
        'price_full_payment',
        'status_fp',
        'payment_status',
        'tire_status',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inspection()
    {
        return $this->hasMany(Inspection::class);
    }

}
