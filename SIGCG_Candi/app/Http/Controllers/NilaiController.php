<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Survey;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function show(){
        $sesi=Survey::get();
        $id = 0;
        foreach ($sesi as $item)
        {
            $id = $item->id_sesi;
        }
        $nilai = Nilai::where('id_user',auth()->user()->id)->where('id_sesi',$id)->get();
        return view('nilai', compact('nilai'));
    }

    public function nilai() {
        $nilai = Answer::join('nilai', 'answers.id_user', '=', 'nilai.id_user')->get(['nilai*', 'answers*']);
        $soal = Survey::count();

        $benar = 0;
        $salah = 0;
        $bobot = 100/$soal;
        $skor = 0;
        foreach($nilai as $items){
            if ($items->status=='benar'){
                $benar += 1;
            }
            else {
                $salah += 1;
            }
            $skor = $bobot * $benar;
        }

        Nilai::where('id_user',auth()->user()->id)->update([
            'nilai' => $skor
        ]);
        return redirect('/nilai');
    }
}
