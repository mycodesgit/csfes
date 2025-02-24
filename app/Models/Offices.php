<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'offices';

    protected $fillable = [
        'office_name',
        'office_abbr',
    ];
}
