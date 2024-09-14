<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_terakhir_service',
        'tanggal_service_selanjutnya',
        'unit',
    ];
}
