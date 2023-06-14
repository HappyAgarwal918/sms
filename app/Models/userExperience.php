<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userExperience extends Model
{
    use HasFactory;

    protected $table = 'user_experience';

    protected $fillable = [
        'user_id',
        'institute_name',
        'designation',
        'joining_date',
        'end_date',
    ];

    // public $timestamps = false;
}
