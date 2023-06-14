<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class id_proof extends Model
{
    use HasFactory;

    protected $table = 'id_proof';

    protected $fillable = [
        'user_id',
        'id_proof_name',
        'id_proof_path',
    ];

    // public $timestamps = false;
}
