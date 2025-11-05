<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'orphanage_id', 'location', 'item_name', 'quantity',
        'source', 'value', 'note', 'condition'
    ];

    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class);
    }
}