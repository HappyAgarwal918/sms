<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_12th extends Model
{
    use HasFactory;

    protected $table = 'file_12th';

    protected $fillable = [
        'user_id',
        'file_name_12th',
        'file_path_12th',
    ];

    // public $timestamps = false;
}
