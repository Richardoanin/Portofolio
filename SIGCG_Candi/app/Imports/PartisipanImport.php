<?php

namespace App\Imports;

use App\Models\Partisipan;
use Maatwebsite\Excel\Concerns\ToModel;

class PartisipanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Partisipan([
            'nama' => $row[1],
            'nik' => $row[2],
            'bagian' => $row[3],
            'jabatan' => $row[4],
            'status' => $row[5],
        ]);
    }
}
