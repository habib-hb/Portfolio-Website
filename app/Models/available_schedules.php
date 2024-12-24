<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class available_schedules extends Model
{
    use HasFactory;

    protected $table = 'available_schedules';
    protected $primaryKey = 'schedules_id';

    protected $fillable = [
        'type',
        'schedules',
    ];
}
