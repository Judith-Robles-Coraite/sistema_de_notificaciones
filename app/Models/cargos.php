<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargos extends Model
{
    protected $table= 'cargos_plantel';
    protected $primaryKey = 'id_cargos_plantel';
    public $timestamps = false;

    public function docentes(){

        return $this->hasOne(docentes::class,'id_docentes');
    }
}