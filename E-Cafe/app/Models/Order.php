<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = "order_details";
    public $timestamps = false;
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }
}
