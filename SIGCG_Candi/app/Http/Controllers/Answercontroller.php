<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Sesi;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class Answercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        $id_sesi = 0;
        
        foreach($req['id_soal'] as  $row)
        {
            $answer = Answer::where('id_user',auth()->user()->id)->where('id_soal',$row)->get();
            $jawaban = "jawaban".$row;

            //mencari kunci
            $data_kunci = Survey::where('id',$row)->first();
            $id_sesi = $data_kunci->id_sesi;
                //benar
                if (count($answer)>0) {
                    $answer->first()->update([
                        'id_user' => auth()->user()->id,
                        'id_soal' => $row,
                        'jawaban' => $req[$jawaban][0],
                        'kunci' => $data_kunci->jawaban,
                        'status' => $req[$jawaban][0] == $data_kunci->jawaban ? 'benar' : 'salah'
                    ]);
                }else {
                    Answer::create([
                        'id_user' => auth()->user()->id,
                        'id_soal' => $row,
                        'jawaban' => $req[$jawaban][0],
                        'kunci' => $data_kunci->jawaban,
                        'status' => $req[$jawaban][0] == $data_kunci->jawaban ? 'benar' : 'salah'
                    ]);
                }
            }  

        $nilai = Answer::where('id_user',auth()->user()->id)->get();
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

        $kategori = "";
        
        if ($skor <= 69){
            $kategori = 'C';
        }
        if ($skor >= 70){
            $kategori = 'BC';
        }
        if ($skor >= 75){
            $kategori = 'B';
        }
        if ($skor >= 80){
            $kategori = 'AB';
        }
        if ($skor >= 90){
            $kategori = 'A';
        }

        Nilai::create([
            'id_sesi' => $id_sesi,
            'id_user' => auth()->user()->id,
            'benar' => $benar,
            'salah' => $salah,
            'nilai' => $skor,
            'kategori' => $kategori
        ]);
        
        return redirect('/nilai')->with('status', 'Your answers successfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
