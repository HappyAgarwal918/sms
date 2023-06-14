<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class graduation_file extends Model
{
    use HasFactory;

    protected $table = 'graduation_file';

    protected $fillable = [
        'user_id',
        'graduation_file_name',
        'graduation_file_path',
    ];

    // public $timestamps = false;
}
