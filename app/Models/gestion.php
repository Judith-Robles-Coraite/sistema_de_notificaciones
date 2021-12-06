<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestion extends Model
{
    protected $table= 'gestion_escolar';
    protected $primaryKey = 'id_gestion_escolar';

    public function registros(){

        return $this->hasOne(registros::class,'id_registros');
    }

    public function asistencia(){

        return $this->hasOne(asistencia::class,'id_asistencia');
    }

}