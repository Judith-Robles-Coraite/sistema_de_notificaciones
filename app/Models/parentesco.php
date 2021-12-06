<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentesco extends Model
{
    protected $table = 'parentescos';
    protected $primaryKey = 'id_parentescos';

    public $timestamps = false;

    public function registros(){

        return $this->hasOne(registros::class,'id_registros');
    }
}