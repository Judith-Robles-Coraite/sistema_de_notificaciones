<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table= 'usuarios';
    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    public function tipousuario(){

        return $this->belongsTo(tipo_usuario::class,'id_tipo_usuario');

    }
    public function docentes(){

        return $this->hasOne(docentes::class,'id_docentes');

    }
    
}