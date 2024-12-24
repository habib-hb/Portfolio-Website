<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booked_appointments extends Model
{
    use HasFactory;

    protected $table = 'booked_appointments';

    protected $primaryKey = 'booked_appointments_id';

    protected $fillable = [
        'appointments',
        'date'
    ];
}
