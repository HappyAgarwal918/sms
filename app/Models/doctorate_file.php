<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorate_file extends Model
{
    use HasFactory;

    protected $table = 'doctorate_file';

    protected $fillable = [
        'user_id',
        'doctorate_file_name',
        'doctorate_file_path',
    ];

    // public $timestamps = false;
}
