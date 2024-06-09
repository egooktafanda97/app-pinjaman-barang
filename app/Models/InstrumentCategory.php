<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentCategory extends Model
{
    use HasFactory;
    protected $table = 'instrument_categories';
    protected $fillable = ['name', 'description'];
}
