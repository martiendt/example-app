<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XHargaInfor extends Model
{
    use HasFactory;
    protected $table = 'xhargainfor'; 	
    protected $guarded = [];
    public $timestamps = false;
}
