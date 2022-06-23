<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = "pembelians";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
