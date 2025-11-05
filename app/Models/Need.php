<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $fillable = ['orphanage_id', 'item', 'description'];

    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class);
    }
}