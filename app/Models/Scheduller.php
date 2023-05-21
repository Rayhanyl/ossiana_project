<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduller extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'order_id',
        'inspection_id',
        'total_tire',
        'initial_inspection',
        'washing',
        'hotroom',
        'flexible_buffing',
        'tire_washing',
        'cementing',
        'building_perfection',
        'grooving',
        'curing',
        'finishing',
        'final_inspection',
        'total_hour',
        'estimasi_due_date',
        'start_reparation_date',
        'end_reparation_date',
    ];
}
