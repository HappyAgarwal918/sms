<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcc_file extends Model
{
    use HasFactory;

    protected $table = 'pcc_file';

    protected $fillable = [
        'user_id',
        'pcc_name',
        'pcc_path',
    ];

    // public $timestamps = false;
}
