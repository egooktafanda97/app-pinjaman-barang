<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianBarang extends Model
{
    use HasFactory;
    protected $table = 'pengembalian_barang';

    protected $fillable = [
        'instrument_borrowal_id',
        'instrument_id',
        'borrower_id',
        'tanggal_pengembalian',
        'keterangan',
        'jumlah',
        'jumlah_bagus',
        'jumlah_rusak',
    ];

    // Define relationships if necessary

    public function instrumentBorrowal()
    {
        return $this->belongsTo(InstrumentBorrowal::class, 'instrument_borrowal_id');
    }

    public function instrument()
    {
        return $this->belongsTo(TraditionalMusicalInstrument::class, 'instrument_id');
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id');
    }
}
