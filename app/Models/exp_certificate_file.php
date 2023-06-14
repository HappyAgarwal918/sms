<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exp_certificate_file extends Model
{
    use HasFactory;

    protected $table = 'exp_certificate_file';

    protected $fillable = [
        'user_id',
        'exp_certificate_name',
        'exp_certificate_path',
    ];

    // public $timestamps = false;
}
