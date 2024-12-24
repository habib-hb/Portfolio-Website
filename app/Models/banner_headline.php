<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner_headline extends Model
{
    use HasFactory;

    protected $table = 'banner_headline';

    protected $primaryKey = 'banner_headline_id';

    public $timestamps = false;

    protected $fillable = [
        'banner_type',
        'banner_text',
    ];

}
