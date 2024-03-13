<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'birthdate',
        'occupation',
        'gender'
    ];

    public function instrumentBorrowals()
    {
        return $this->hasMany(InstrumentBorrowal::class);
    }
}
