<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'criteria_id',
        'sub_criteria_name',
        'range',
        'value',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
