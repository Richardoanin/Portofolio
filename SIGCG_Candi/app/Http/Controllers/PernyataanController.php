<?php

namespace App\Http\Controllers;

use App\Models\Partisipan;
use App\Models\Pernyataan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PernyataanController extends Controller
{
    public function pernyataan()
    {
        $user = User::where('id',auth()->user()->id)->where('role','user')->get();
        $admin = User::where('role','user')->get();
        return view('pernyataan', compact('user','admin'));
    }

    public function input(Request $request, $id)
    {
        if ($request->ttd) {
            $imgName = time() . $request->ttd->getClientOriginalName();
            $request->ttd->move(public_path('gambar'), $imgName);

            User::find($id)->update([
                'tanggal' => $request->tanggal,
                'ttd' => $imgName
            ]);
        }
        return redirect("pernyataan/".$id);
    }

    public function show(){
        $user = User::where('id',Auth::user()->id)->get();
        return view('pernyataan', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);
    
        if($request->hasFile('file')) {
            $uploadPath = public_path('files');
    
            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
    
            $file = $request->file('file');
            $explode = explode('.', $file->getClientOriginalName());
            $originalName = $explode[0];
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $mime = $file->getClientMimeType();
            $filesize = $file->getSize();
    
            if($file->move($uploadPath, $rename)) {
                $media = new Pernyataan;
                $media->id_user = $request->id_user;
                $media->name = $originalName;
                $media->file = $rename;
                $media->extension = $extension;
                $media->size = $filesize;
                $media->mime = $mime;
                $media->save();
    
                return redirect()->back()->with('success', 'Berhasil, file telah di upload');
            }
    
            return redirect()->back()->with('message', 'Error, file tidak dapat di upload');
        }
    
        return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
    }

    public function cari(Request $request)
	{

		$cari = $request->cari;

        $admin = DB::table('users')
		->where('nama','like',"%".$cari."%")->orwhere('nik','like',"%".$cari."%")->orwhere('bagian','like',"%".$cari."%")
        ->orwhere('jabatan','like',"%".$cari."%")
		->paginate();
 
		return view('pernyataan',['admin' => $admin]);

	}
}
