<?php

namespace App\Models\Admin;

use App\Models\Admin\Tema;
use App\Models\Admin\Genero;
use App\Models\Admin\Delegacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "usuarios";
    protected $fillable = [
        'id_delegacion',
        'id_tema',
        'nombre',
        'apaterno',
        'amaterno',
        'id_genero',
        'rfc',
        'curp',
        'npersonal',
        'email',
        'telefono',
        'folio',
        'dirección',
        'cp',
        'ciudad',
        'estado',
    ];    
    /**
     * Get the Tema that owns the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema', 'id');
    }     
    public function delegacion()
    {
        return $this->belongsTo(Delegacion::class, 'id_delegacion', 'id');
    }     
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id');
    }     
}
