<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extra_achieve_file extends Model
{
    use HasFactory;

    protected $table = 'extra_achieve_file';

    protected $fillable = [
        'user_id',
        'extra_achieve_name',
        'extra_achieve_path',
    ];

    // public $timestamps = false;
}
