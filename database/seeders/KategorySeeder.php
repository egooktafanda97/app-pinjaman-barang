<?php

namespace Database\Seeders;

use App\Models\InstrumentCategory;
use App\Models\TypesTradisonal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypesTradisonal::insert([
            [
                "name" => "Alat Musik",
            ],
            [
                "name" => "Pkayan Tradisional"
            ]
        ]);

        InstrumentCategory::insert([
            [
                "name" => "Gamelan",
                "types_id" => 1,
                "description" => "Gamelan adalah alat musik tradisional yang terdiri dari beberapa instrumen yang dimainkan secara bersamaan."
            ],
            [
                "name" => "Angklung",
                "types_id" => 1,
                "description" => "Angklung adalah alat musik tradisional yang terbuat dari bambu dan dimainkan dengan cara digoyangkan."
            ],
            [
                "name" => "Sasando",
                "types_id" => 1,
                "description" => "Sasando adalah alat musik petik yang berasal dari Rote, Nusa Tenggara Timur, dan terbuat dari daun lontar."
            ],
            [
                "name" => "Pakayan Adat",
                "types_id" => 2,
                "description" => "Pakayan adat adalah alat musik tradisional yang digunakan dalam upacara adat."
            ],
            [
                "name" => "Tari Tradisional",
                "types_id" => 2,
                "description" => "Tari tradisional adalah tarian yang berasal dari daerah tertentu dan memiliki makna tertentu."
            ],
            [
                "name" => "Wayang Kulit",
                "types_id" => 2,
                "description" => "Wayang kulit adalah seni pertunjukan tradisional Indonesia yang menggunakan wayang kulit sebagai media pertunjukan."
            ],
        ]);
    }
}
