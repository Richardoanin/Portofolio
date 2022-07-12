<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\materi;
use App\Models\Nilai;
use App\Models\Survey;
use App\Models\User;
use App\Imports\SurveyImport;
use App\Models\Sesi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    // Tampilan Survey Untuk Admin
    public function survey()
    {
        $data = Survey::get();
        $sesi = Sesi::get();
        return view('survey', compact('data','sesi'));
    }

    public function store(Request $request)
    {
        Survey::create([
            'id_sesi' => $request -> sesi,
            'pertanyaan' => $request -> pertanyaan,
            'opsi1' => $request -> opsi1,
            'opsi2' => $request -> opsi2,
            'opsi3' => $request -> opsi3,
            'opsi4' => $request -> opsi4,
            'jawaban' => $request -> jawaban
        ]);

        return redirect('/survey');
    }

    public function update(Request $request, $id)
    {
        Survey::find($id)->update([
            'id_sesi' => $request -> sesi,
            'pertanyaan' => $request -> pertanyaan,
            'opsi1' => $request -> opsi1,
            'opsi2' => $request -> opsi2,
            'opsi3' => $request -> opsi3,
            'opsi4' => $request -> opsi4,
            'jawaban' => $request -> jawaban
        ]);
        return redirect('/survey');
    }

    public function updateAll(Request $request)
    {
        $input = $request->sesi;
        Survey::query()->update([
            'id_sesi' => $input
        ]);
        return redirect('/survey');
    }

    public function destroy($id)
    {
        Survey::find($id)->delete();
        return redirect('/survey');
    }

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_soal',$nama_file);
 
		// import data
		Excel::import(new SurveyImport, public_path('/file_soal/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/survey');
    }

    // Tampilan Survey Untuk User
    public function show(Request $request)
    {
        $data = Survey::get();
        return view('surveyUser', compact('data'));
    }

    public function shows(Request $request)
    {
        $id_sesi = 0;
        $cek = false;
        $data = materi::get();
        $survey = Survey::join('sesi','surveys.id_sesi','=','sesi.id')->get(['surveys.id_sesi','sesi.*'])->first();
        if (strtotime(date("D, d-m-Y H:i")) > strtotime($survey->selesai)){
            $cek=true;
            $id_sesi = $survey->id_sesi;
        }else {
            $cek=false;
            $id_sesi = $survey->id_sesi;
        }
        $nilai = Nilai::join('users','nilai.id_user','=','users.id')->where('id_sesi',$id_sesi)->get(['nilai.*','users.nama']);
        return view('startSurvey',compact('data','nilai','survey','cek'));
    }

    public function carii(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('materis')
		->where('materi','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('startSurvey',['data' => $data]);

	}

    public function start(Request $request)
    {   
        return redirect('/survey/user');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table('surveys')
		->where('pertanyaan','like',"%".$cari."%")->orWhere('opsi1','like',"%".$cari."%")->orWhere('opsi2','like',"%".$cari."%")
        ->orWhere('opsi3','like',"%".$cari."%")->orWhere('opsi4','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('survey',['data' => $data]);

	}
}
