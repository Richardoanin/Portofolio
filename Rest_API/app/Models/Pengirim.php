<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    protected $table = 'pengirims';
    protected $fillable = ['nama_pengirim', 'kota_pengirim', 'telp_pengirim']; 
    use HasFactory;
}
