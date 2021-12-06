<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    protected $table= 'registros';
    protected $primaryKey = 'id_registros';

    public $timestamps = false;
    public function estudiantes(){

        return $this->belongsTo(estudiante::class,'id_estudiante');
    }

    public function aulas(){

        return $this->belongsTo(aulas::class,'id_aula');

    }

    public function gestion(){

        return $this->belongsTo(gestion::class,'id_gestion_escolar');

    }

    public function representante(){

        return $this->belongsTo(representante::class,'id_representate');

    }

    public function parentesco(){

        return $this->belongsTo(parentesco::class,'id_parentescos');

    }

    

}