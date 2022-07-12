<?php

namespace App\Http\Controllers;

use App\Models\Partisipan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\PartisipanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PartisipanController extends Controller
{
    public function store(Request $request)
    {
        User::create([
            'nama' => $request -> nama,
            'nik' => $request -> nik,
            'bagian' => $request -> bagian,
            'jabatan' => $request -> jabatan,
            'status' => $request -> status,
            'username' => $request -> username,
            'password' => Hash::make($request -> password),
            'role' => $request -> role
        ]);

        return redirect('/partisipan')->with('Success', 'Data berhasil ditambahkan!');
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
		Excel::import(new PartisipanImport, public_path('/file_soal/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/partisipan');
    }

    public function partisipan()
    {
        $data = Partisipan::get();
        return view('partisipan', compact('data'));
    }

    public function edit(Request $request)
    {
        $data = Partisipan::get();
        return view('partisipan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Partisipan::find($id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'bagian' => $request->bagian,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect('/partisipan')->with('Success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Partisipan::find($id)->delete();
        return redirect('/partisipan')->with('Success', 'Data berhasil dihapus!');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('users')
		->where('nama','like',"%".$cari."%")->orwhere('nik','like',"%".$cari."%")->orwhere('bagian','like',"%".$cari."%")
        ->orwhere('jabatan','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('partisipan',['data' => $data]);
 
	}
}
