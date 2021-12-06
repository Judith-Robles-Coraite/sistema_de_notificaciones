<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $table= 'estudiantes';
    protected $primaryKey = 'id_estudiantes';

    public function registros(){

        return $this->hasOne(registros::class,'id_registros');
    }
}
