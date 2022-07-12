<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pernyataan extends Model
{
    protected $table = "pernyataans";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
