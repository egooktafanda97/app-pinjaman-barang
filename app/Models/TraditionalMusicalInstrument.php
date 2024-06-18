<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraditionalMusicalInstrument extends Model
{
    use HasFactory;
    // Nama tabel yang terkait dengan model ini
    protected $table = 'traditional_musical_instruments';

    // Kolom yang dapat diisi melalui metode mass assignment
    protected $fillable = [
        'name',
        'types_id',
        'description',
        'instrument_categories_id',
        'origin',
        'year',
        'material',
        'availability',
        'lendable',
        'broken',
        'image',
        'video',
        'audio',
        'history',
        'source',
    ];


    // types
    public function types()
    {
        return $this->belongsTo(TypesTradisonal::class, 'types_id');
    }

    // Relasi ke kategori alat musik tradisional
    public function category()
    {
        return $this->belongsTo(InstrumentCategory::class, 'instrument_categories_id');
    }
}
