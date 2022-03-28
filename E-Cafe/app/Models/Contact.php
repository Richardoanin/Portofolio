<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = "contact";
    public $timestamps = false;
    public function getTakeImageAttribute()
    {
        return "storage/" . $this->gambar;
    }
}
