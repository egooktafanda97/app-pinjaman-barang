<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentImage extends Model
{
    protected $fillable = ['instrument_id', 'url'];

    public function instrument()
    {
        return $this->belongsTo(TraditionalMusicalInstrument::class);
    }
}
