<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\performance;
use App\Models\Pembelian;
use Redirect,Response;
Use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $record = Pembelian::select('pilihan as List', \DB::raw("COUNT(pilihan) as count"), 'pilihan')
        ->groupBy('pilihan')
        ->get();
    
        $data = [];
    
        foreach($record as $row) {
            $data['label'][] = $row->pilihan;
            $data['data'][] = (int) $row->count;
        }
    
        $data['chart_data'] = json_encode($data);

        return view('admin.performance', $data);
    }
}

