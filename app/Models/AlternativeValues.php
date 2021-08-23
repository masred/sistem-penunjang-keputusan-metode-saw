<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeValues extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'alternative_id',
        'criteria_id',
        'value',
    ];
}
