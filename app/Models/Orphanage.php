<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $fillable = [
        'name', 'location', 'child_count', 'description',
        'photo', 'needs', 'facilities', 'categories'
    ];

    protected $casts = [
        'needs' => 'array',
        'facilities' => 'array',
        'categories' => 'array',
    ];

    public function contacts()
    {
        return $this->hasMany(OrphanageContact::class);
    }
}