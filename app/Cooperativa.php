<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperativa extends Model
{
    //
    //use SoftDeletes;
    protected $fillable = [
        'nombre',
        'fecha_inscripcion',
        'numero_orden'
    ];

    public function productors()
    {
        return $this->hasMany(Productor::class);
    }
}
