<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operational;

class OperationalSeeder extends Seeder
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
                'open' => "08:00:00",
                'close' => "20:00:00",
                'day' => "Senin",
                'keterangan' => "Buka",
            ],
            [
                'open' => "10:00:00",
                'close' => "22:00:00",
                'day' => "Selasa",
                'keterangan' => "Buka",
            ],
        );
        foreach ($data as $d){
            Operational::create([
                'open' => $d['open'],
                'close' => $d['close'],
                'day' => $d['day'],
                'keterangan' => $d['keterangan'],
            ]);
        }
    }
}
