<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{  
    protected $primaryKey = 'id_lugar';
    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'id_poblacion',
    ];
    protected $table = 'lugares';
    use HasFactory;
}
