<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    protected $table= 'asistencia';
    protected $primaryKey = 'id_asistencia';
    public $timestamps = false;
    
    public function aulas(){

        return $this->belongsTo(aulas::class,'id_aula');
    }

    public function gestion(){

        return $this->belongsTo(gestion::class,'id_gestion_escolar');
    }

    
}