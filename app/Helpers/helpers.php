<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraditionalMusicalInstrument extends Model
{
    protected $fillable = ['name', 'description', 'origin', 'year', 'material'];

    public function categories()
    {
        return $this->belongsToMany(InstrumentCategory::class, 'instrument_category_pivot', 'instrument_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(InstrumentImage::class);
    }
}
