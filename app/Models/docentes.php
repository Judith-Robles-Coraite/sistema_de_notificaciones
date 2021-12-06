<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    protected $table= 'docentes';
    protected $primaryKey = 'id_docentes';

    public $timestamps = false;

    public function usuarios(){

        return $this->belongsTo(usuarios::class,'id_usuario');

    }
    public function cargos(){

        return $this->belongsTo(cargos::class,'id_cargo');
    }

    public function aulas(){

        return $this->hasOne(aulas::class,'id_aulas');
    }
}