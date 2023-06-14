<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userExtra extends Model
{
    use HasFactory;

    protected $table = 'user_extra';

    protected $fillable = [
        'user_id',
        'police_case',
        'extra_achievement',
    ];

    // public $timestamps = false;
}
