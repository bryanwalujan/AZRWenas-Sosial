<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'orphanage_id', 
        'name', 
        'gender', 
        'birth_place', 
        'birth_date',
        'education_level', 
        'status', 
        'in_house'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'in_house' => 'boolean',
    ];

    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class);
    }
}