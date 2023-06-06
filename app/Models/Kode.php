<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kode extends Model
{
    protected $table='cart';
    protected $guarded = ['id'];
    
    public function menu(){
        return $this->belongsTo(menu::class);
    }
   
}
