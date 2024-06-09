<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraditionalMusicalInstrumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('traditional_musical_instruments')->insert([
            [
                'name' => 'Gamelan',
                'description' => 'Gamelan adalah alat musik tradisional yang terdiri dari beberapa instrumen yang dimainkan secara bersamaan.',
                'instrument_categories_id' => 1,
                'origin' => 'Jawa',
                'year' => '1800',
                'material' => 'Logam dan kayu',
                'availability' => 10,
                'lendable' => 8,
                'broken' => 2,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Gamelan sudah ada sejak zaman kerajaan di Jawa dan sering dimainkan pada upacara adat dan acara besar.',
                'source' => 'https://id.wikipedia.org/wiki/Gamelan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Angklung',
                'description' => 'Angklung adalah alat musik tradisional yang terbuat dari bambu dan dimainkan dengan cara digoyangkan.',
                'instrument_categories_id' => 2,
                'origin' => 'Sunda',
                'year' => '1900',
                'material' => 'Bambu',
                'availability' => 15,
                'lendable' => 12,
                'broken' => 3,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Angklung merupakan alat musik yang telah lama digunakan oleh masyarakat Sunda dan menjadi warisan budaya dunia.',
                'source' => 'https://id.wikipedia.org/wiki/Angklung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sasando',
                'description' => 'Sasando adalah alat musik petik yang berasal dari Rote, Nusa Tenggara Timur, dan terbuat dari daun lontar.',
                'instrument_categories_id' => 3,
                'origin' => 'Rote, Nusa Tenggara Timur',
                'year' => '1700',
                'material' => 'Daun lontar dan bambu',
                'availability' => 5,
                'lendable' => 4,
                'broken' => 1,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Sasando telah menjadi bagian dari kehidupan masyarakat Rote dan sering digunakan dalam upacara adat.',
                'source' => 'https://id.wikipedia.org/wiki/Sasando',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
