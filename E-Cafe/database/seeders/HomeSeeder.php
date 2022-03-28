<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Information;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'judul' => "Start The Day With Great Taste",
                'deskripsi' => "People say money can't buy happiness. They lie, Money can buy coffee and coffee makes people happy!",
                'location' => "11-12 Jl. Braga, Kota Bandung, Jawa Barat",
                'gambar' => "judul/kzyKyqcJ1SS71ndgsBP4pzZxNX9bE4msll668abO.png",
            ],
        );
        foreach ($data as $d){
            Information::create([
                'judul' => $d['judul'],
                'deskripsi' => $d['deskripsi'],
                'location' => $d['location'],
                'gambar' => $d['gambar'],
            ]);
        }
    }
}
