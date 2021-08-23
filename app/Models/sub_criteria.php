<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_criteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'criteria_id',
        'sub_criteria_name',
        'value',
    ];
}
