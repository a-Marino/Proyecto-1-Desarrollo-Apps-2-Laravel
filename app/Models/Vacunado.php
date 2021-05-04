<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacunado extends Model
{
    use HasFactory;
    protected $table = 'vacunados';

    protected $fillable = [
        'DNI',
        'apelnom',
        'edad',
        'domicilio',
        'grupo_riesgo',
    ];

}
