<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public function instruments()
    {
        return $this->belongsToMany(TraditionalMusicalInstrument::class, 'instrument_category_pivot', 'category_id', 'instrument_id');
    }
}
