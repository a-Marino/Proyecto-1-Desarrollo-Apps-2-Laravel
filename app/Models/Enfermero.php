<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermero extends Model
{
    use HasFactory;
    protected $table = 'enfermeros';

    protected $fillable = [
        'user_id',
        'RUP',
        'telefono',
    ];

    public function users() {
    	return $this->hasMany('\App\Models\User', 'user_id');
    }
}
