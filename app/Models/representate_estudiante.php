<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class representate_estudiantes extends Model
{
    protected $table= 'representates_estudiantes';
    protected $primaryKey = 'id_representates_estudiantes';

    public $timestamps = false;
}
