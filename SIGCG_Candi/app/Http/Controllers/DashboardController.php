<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $lihat = $request->lihat;
        $lihat_sesi = Sesi::find($lihat);
        $nilai = User::leftjoin('nilai','users.id','=','nilai.id_user')->where('role','user')->where('id_sesi',$lihat)->get(['users.nama','users.jabatan','nilai.*']);
        $sesi = Sesi::get();

        $record = Nilai::select('kategori as List', DB::raw("COUNT(kategori) as count"), 'kategori')->where('id_sesi',$lihat)
        ->groupBy('kategori')
        ->get();

        $data = [];
    
        foreach($record as $row) {
            $data['label'][] = $row->kategori;
            $data['data'][] = (int) $row->count;
        }
    
        $data['chart_data'] = json_encode($data);

        return view('dashboard', $data, compact('nilai','sesi','lihat','lihat_sesi'));
    }

    public function destroy($id)
    {
        Nilai::find($id)->delete();
        return redirect('/dashboard')->with('Success', 'Data berhasil dihapus!');
    }
}
