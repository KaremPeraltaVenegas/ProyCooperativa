<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    //
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'dni',
        'cooperativa_id',
        'productors_id',
    ];

    public function cooperativa()
    {
        return $this->belongsTo(Cooperativa::class);
    }

    public function productor()
    {
        return $this->belongsTo(self::class, "productors_id");
    }
}
