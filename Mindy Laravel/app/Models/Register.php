<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = "table_user";
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ["id"];
}
