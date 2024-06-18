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
                "types_id" => 1,
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
                "types_id" => 1,
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
                "types_id" => 1,
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
            ],
            // pakayan tradisioonal
            [
                'name' => 'Keris',
                "types_id" => 2,
                'description' => 'Keris adalah senjata tradisional Indonesia yang terbuat dari besi dan memiliki bilah berpola.',
                'instrument_categories_id' => 4,
                'origin' => 'Jawa',
                'year' => '1600',
                'material' => 'Besi dan kayu',
                'availability' => 20,
                'lendable' => 18,
                'broken' => 2,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Keris telah digunakan oleh masyarakat Indonesia sejak zaman kerajaan dan sering dijadikan sebagai simbol keberanian.',
                'source' => 'https://id.wikipedia.org/wiki/Keris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wayang Kulit',
                "types_id" => 2,
                'description' => 'Wayang kulit adalah seni pertunjukan tradisional Indonesia yang menggunakan wayang berbahan kulit.',
                'instrument_categories_id' => 5,
                'origin' => 'Jawa',
                'year' => '1500',
                'material' => 'Kulit dan kayu',
                'availability' => 25,
                'lendable' => 22,
                'broken' => 3,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Wayang kulit telah menjadi bagian dari kehidupan masyarakat Indonesia dan sering dipentaskan dalam berbagai acara.',
                'source' => 'https://id.wikipedia.org/wiki/Wayang_kulit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Batik',
                "types_id" => 2,
                'description' => 'Batik adalah kain tradisional Indonesia yang dihiasi dengan motif tertentu menggunakan teknik tertentu.',
                'instrument_categories_id' => 6,
                'origin' => 'Jawa',
                'year' => '1400',
                'material' => 'Kain dan pewarna alami',
                'availability' => 30,
                'lendable' => 27,
                'broken' => 3,
                'image' => 'o2WZYMj5yjvmjNJX1717171136.jpg',
                'history' => 'Batik telah menjadi bagian dari kehidupan masyarakat Indonesia dan sering digunakan dalam berbagai acara.',
                'source' => 'https://id.wikipedia.org/wiki/Batik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
