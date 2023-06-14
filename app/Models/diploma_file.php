<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diploma_file extends Model
{
    use HasFactory;

    protected $table = 'diploma_file';

    protected $fillable = [
        'user_id',
        'diploma_file_name',
        'diploma_file_path',
    ];

    // public $timestamps = false;
}
