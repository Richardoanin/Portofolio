<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = "products";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
