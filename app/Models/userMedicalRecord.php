<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userMedicalRecord extends Model
{
    use HasFactory;

    protected $table = 'user_medical_record';

    protected $fillable = [
        'user_id',
        'blood_group',
        'medical_condition',
        'vaccination',
        'allergies',
    ];

    // public $timestamps = false;
}
