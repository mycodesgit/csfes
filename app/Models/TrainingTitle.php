<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingTitle extends Model
{
    use HasFactory;

    protected $table = 'training_title';

    protected $fillable = [
        'title',
        'office',
        'speaker',
        'training_date',
        'training_venue',
        'surveylink',
        'postedBy',
        'remember_token'
    ];
}
