<?php

namespace App\Models\Admin;

use App\Models\Admin\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
{
    use HasFactory;
    protected $table="temas";
    protected $fillable=['titulo','descripcion',];

    /**
     * Get all of the usuarios for the Tema
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()  
    {
        return $this->hasMany(Usuario::class, 'id_tema', 'id');
    } 
}
