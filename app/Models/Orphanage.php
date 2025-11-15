<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Orphanage extends Model
{
    protected $fillable = [
        'name', 'location', 'child_count', 'description',
        'photo', 'facilities', 'categories','founded_year', 'address', 'phone', 'email', 'legal_documents',
    'vision', 'mission', 'target_service', 'capacity',
    'in_house_male', 'in_house_female', 'external_male', 'external_female',
    'foundation_name', 'history', 'leader_name', 'leader_phone',
    'secretary_name', 'secretary_phone', 'treasurer_name', 'treasurer_phone',
    'land_area', 'land_status'
    ];

    protected $casts = [
    
    'facilities' => 'array',
    'categories' => 'array',
    'target_service' => 'array',
    'legal_documents' => 'array',
    'founded_year' => 'integer',
    'capacity' => 'integer',
    'in_house_male' => 'integer',
    'in_house_female' => 'integer',
    'external_male' => 'integer',
    'external_female' => 'integer',
    'land_area' => 'decimal:2',
];

    public function contacts()
    {
        return $this->hasMany(OrphanageContact::class);
    }

    public function inventories()
{
    return $this->hasMany(Inventory::class);
}

public function children()
{
    return $this->hasMany(Child::class);
}

// Tambahkan accessor
public function getChildCountAttribute()
{
    return $this->children()->count();
}

public function needs()
{
    return $this->hasMany(Need::class);
}

}