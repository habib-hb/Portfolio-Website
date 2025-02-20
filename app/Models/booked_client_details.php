<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booked_client_details extends Model
{
    use HasFactory;

    protected $table = 'booked_client_details';

    protected $primaryKey = 'booked_client_id';

    protected $fillable = [
       'name',
       'email',
       'contact_number',
       'address',
       'written_need',
       'appointment_date',
       'appointment_time',
       'appointment_status'
    ];
}
