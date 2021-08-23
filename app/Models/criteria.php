<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'criteria_name',
        'attribute',
        'weight',
    ];
}
