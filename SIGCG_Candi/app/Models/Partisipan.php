<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partisipan extends Model
{
    protected $table = "users";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
