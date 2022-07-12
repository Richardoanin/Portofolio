<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = "sesi";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
}
