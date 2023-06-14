<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_10th extends Model
{
    use HasFactory;

    protected $table = 'file_10th';

    protected $fillable = [
        'user_id',
        'file_name_10th',
        'file_path_10th',
    ];

    // public $timestamps = false;
}
