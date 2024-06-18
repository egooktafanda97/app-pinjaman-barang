<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesTradisonal extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $fillable = ['name', 'description'];

    public function traditionalMusicalInstruments()
    {
        return $this->hasMany(TraditionalMusicalInstrument::class, 'types_id');
    }
}
