<?php

namespace App\Imports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\ToModel;

class SurveyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Survey([
            'sesi' => $row[1],
            'pertanyaan' => $row[2],
            'opsi1' => $row[3],
            'opsi2' => $row[4],
            'opsi3' => $row[5],
            'opsi4' => $row[6],
            'jawaban' => $row[7],
        ]);
    }
}
