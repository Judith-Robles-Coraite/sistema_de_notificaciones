<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class representante extends Model
{
    protected $table= 'representates';
    protected $primaryKey = 'id_representantes';

    public $timestamps = false;

    public function registros(){

        return $this->hasOne(registros::class,'id_registros');
    }
}

