<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viajes extends Model
{   
    protected $primaryKey = 'id_viaje';
    protected $table = 'viajes';
    protected $fillable = [
        'nombre'
    ];
    use HasFactory;
}
