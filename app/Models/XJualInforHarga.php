<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XJualInforHarga extends Model
{
    use HasFactory;
    protected $table = 'xjualinforharga'; 	
    protected $guarded = [];
    public $timestamps = false;
}
