<?php

namespace App\Models;

use App\Models\SubCriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'criteria_name',
        'attribute',
        'weight',
    ];

    public function subCriteria()
    {
        return $this->hasMany(SubCriteria::class);
    }
}
