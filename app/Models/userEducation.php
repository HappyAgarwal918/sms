<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userEducation extends Model
{
    use HasFactory;

    protected $table = 'user_education';

    protected $fillable = [
        'user_id',
        'number_10th',
        'year_10th',
        'file_name_10th',
        'file_path_10th',
        'number_12th',
        'year_12th',
        'file_name_12th',
        'file_path_12th',
        'graduation_number',
        'graduation_year',
        'post_grad_number',
        'post_grad_year',
        'doctorate_number',
        'doctorate_year',
        'diploma_number',
        'diploma_year',
        'special_edu_number',
        'special_edu_year',
    ];

    // public $timestamps = false;
}
