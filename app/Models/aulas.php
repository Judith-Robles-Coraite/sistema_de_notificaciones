<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aulas extends Model
{
    protected $table= 'aulas';
    protected $primaryKey = 'id_aulas';
    public $timestamps = false;
    public function grado(){

        return $this->belongsTo(grado::class,'id_grado');
    }

    public function registros(){

        return $this->hasOne(registros::class,'id_registros');
    }

    public function docentes(){

        return $this->belongsTo(docentes::class,'id_docente');

    }

    public function asistencia(){

        return $this->hasOne(asistencia::class,'id_asistencia');
    }

}