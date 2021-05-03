<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table ="asignaciones";

    protected $fillable = [
        'user_id',
        'vacunatorio_id',
        'disable',
    ];
    
}
