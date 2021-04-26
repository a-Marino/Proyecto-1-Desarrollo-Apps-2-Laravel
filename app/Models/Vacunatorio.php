<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacunatorio extends Model
{
    use HasFactory;
    protected $table ="vacunatorios";


    public function centros(){
        return $this->belongsTo('\App\Models\Centro', 'id');
    }

    protected $fillable =[
        'centro_id',
        'medico',
        'horario',
        'telefono',
        'disable'
    ];
}
