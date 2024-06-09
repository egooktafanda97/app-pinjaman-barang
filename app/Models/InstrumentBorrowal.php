<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentBorrowal extends Model
{
    protected $fillable = [
        'borrower_id',
        'instrument_id',
        'borrowed_at',
        'returned_at',
        'purpose',
        'qty',
        'notes',
        'status',
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function instrument()
    {
        return $this->belongsTo(TraditionalMusicalInstrument::class);
    }

    // pengembalian 
    public function pengembalianBarang()
    {
        return $this->hasOne(PengembalianBarang::class);
    }
}
