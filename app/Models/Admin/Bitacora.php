<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bitacora extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "bitacora";
    protected $fillable = [
        'id_dependencia',
        'motivo',
        'fecha_salida',
        'hora',
        'fecha_llegada',
        'status',
        'observacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia');
    }   
}
