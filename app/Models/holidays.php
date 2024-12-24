<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class holidays extends Model
{
    use HasFactory;

    protected $table = 'holidays';

    protected $primaryKey = 'holidays_id';

    protected $fillable = [
        'holidays_category',
        'holidays',
    ];
}
