<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'birthdate',
        'occupation',
        'gender',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instrumentBorrowals()
    {
        return $this->hasMany(InstrumentBorrowal::class);
    }
}
