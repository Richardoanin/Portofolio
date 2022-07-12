<?php

namespace App\Http\Controllers;

use App\Models\materi;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
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
                $media = new materi;
                $media->materi = $request->materi;
                $media->name = $originalName;
                $media->file = $rename;
                $media->extension = $extension;
                $media->size = $filesize;
                $media->mime = $mime;
                $media->save();
    
                return redirect()->back()->with('message', 'Berhasil, file telah di upload');
            }
    
            return redirect()->back()->with('message', 'Error, file tidak dapat di upload');
        }
    
        return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
    }

    public function materi()
    {
        $data = materi::get();
        return view('materi', compact('data'));
    }

    public function edit()
    {
        $data = materi::get();
        return view('materi', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $media = materi::find($request->id);
        if ($request->hasFile('file')) {
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

            $file_upload = $rename;
            $request->file('file')->move(public_path('files'), $file_upload);
            $media = materi::find($id);
            $media->materi = $request->materi;
            $media->name = $originalName;
            $media->file = $rename;
            $media->extension = $extension;
            $media->size = $filesize;
            $media->mime = $mime;
            $media->save();
                
            return redirect()->back()->with('message', 'Berhasil, file telah di update');
        }
    }

    public function destroy($id)
    {
        materi::find($id)->delete();
        return redirect('/materi');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('materis')
		->where('materi','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('materi',['data' => $data]);
 
	}
}
