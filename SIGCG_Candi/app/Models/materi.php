<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    protected $table = "materis";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
