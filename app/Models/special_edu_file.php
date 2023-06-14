<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class special_edu_file extends Model
{
    use HasFactory;

    protected $table = 'special_edu_file';

    protected $fillable = [
        'user_id',
        'special_edu_file_name',
        'special_edu_file_path',
    ];

    // public $timestamps = false;
}
