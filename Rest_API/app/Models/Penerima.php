<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = 'penerimas';
    protected $fillable = ['nama_penerima', 'alamat', 'kode_pos', 'telp_penerima']; 
    use HasFactory;
}
