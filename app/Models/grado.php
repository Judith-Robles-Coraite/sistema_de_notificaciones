<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grado extends Model
{
    protected $table= 'grados';
    protected $primaryKey = 'id_grados';

    public $timestamps = false;

    public function aulas(){

        return $this->hasOne(aulas::class,'id_aulas');
    }
}