<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index()
    {
        $data = Feedback::join('users', 'feedback.id_user', '=', 'users.id')->get(['feedback.*','users.nama']);
        return view('feedback', compact('data'));
    }

    public function store(Request $request)
    {
        $feedback = Feedback::where('id_user',auth()->user()->id)->get();
        if (count($feedback)>0){
            $feedback->first()->update([
                'id_user' => auth()->user()->id,
                'feedback' => $request->feedback,
                'saran' => $request->saran
            ]);
        }else
            Feedback::create([
                'id_user' => auth()->user()->id,
                'feedback' => $request->feedback,
                'saran' => $request->saran
            ]);

        return redirect('/survey/users');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('feedback')
		->join('users', 'feedback.id_user', '=', 'users.id')->where('nama','like',"%".$cari."%")->orWhere('feedback','like',"%".$cari."%")->orWhere('saran','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('feedback',['data' => $data]);

	}
}
