<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $table = "dependencia";
    protected $fillable = [
        'dependencia',
        'slug',
    ];

    public function bitacoras()
    {
        return $this->hasMany(Bitacora::class, 'id_dependencia');
    }    
}
