<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table='pembayaran';
    protected $guarded = ['id_pembayaran'];
    protected $primaryKey = 'id_pembayaran';
    public function order(){
        return $this->belongsTo(Order::class);
    }
}