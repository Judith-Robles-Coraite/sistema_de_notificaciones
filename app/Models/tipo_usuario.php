<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    protected $table= 'tipos_usuarios';
    protected $primaryKey = 'id_tipo_usuario';

    public $timestamps = false;

    public function usuarios(){

        return $this->hasOne(usuarios::class,'id_usuario');

    }
}