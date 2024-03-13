<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentCategoryPivot extends Model
{
    protected $table = 'instrument_category_pivot';
    protected $fillable = ['instrument_id', 'category_id'];
}
