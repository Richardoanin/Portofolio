<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $table = "menu";
    public $timestamps = false;
    public function getTakeImageAttribute()
    {
        return "storage/" . $this->gambar;
    }

    
}
