<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_graduation_file extends Model
{
    use HasFactory;

    protected $table = 'post_graduation_file';

    protected $fillable = [
        'user_id',
        'post_grad_file_name',
        'post_grad_file_path',
    ];

    // public $timestamps = false;
}
