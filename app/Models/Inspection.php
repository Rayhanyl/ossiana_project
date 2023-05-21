<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inspection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'order_id',
        'file_inspection',
        'damage_type',
        'inspection_costs',
        'tire_arrival',
        'user_id',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
