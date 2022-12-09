<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugaresViajes extends Model
{   
    protected $primaryKey = 'id_intermedia';
    protected $table = 'lugares-viajes';
    protected $fillable = [
        'id_lugar',
        'id_viaje',
        'notas'
    ];
    use HasFactory;
}
