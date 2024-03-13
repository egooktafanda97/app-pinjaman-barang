<?php

namespace App\Repositories\;

use Illuminate\Database\Eloquent\Builder;
use Lerouse\LaravelRepository\EloquentRepository;
use App\Models\TraditionalMusicalInstruments;

class TraditionalMusicalInstrumentsRepository extends EloquentRepository
{
    /**
     * Get the Repository Query Builder
     *
     * @return Builder
     */
    public function builder(): Builder
    {
        return TraditionalMusicalInstruments::query();
    }
}
