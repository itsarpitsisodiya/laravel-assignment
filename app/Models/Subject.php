<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'dob',
        'frequency',
        'daily_frequency',
        'med'
    ];
}
