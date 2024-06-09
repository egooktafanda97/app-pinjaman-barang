<?php

namespace Database\Seeders;

use App\Models\InstrumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InstrumentCategory::insert([
            [
                "name" => "Idiophone",
                "description" => "Alat musik yang menghasilkan suara dengan cara menggetarkan seluruh badan alat musik.",
            ],
            [
                "name" => "Membranophone",
                "description" => "Alat musik yang menghasilkan suara dengan cara menggetarkan membran.",
            ],
            [
                "name" => "Aerophone",
                "description" => "Alat musik yang menghasilkan suara dengan cara menggetarkan udara.",
            ],
            [
                "name" => "Chordophone",
                "description" => "Alat musik yang menghasilkan suara dengan cara menggetarkan senar.",
            ],
        ]);
    }
}
