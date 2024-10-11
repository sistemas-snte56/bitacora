<?php

namespace App\Models\Admin;

use App\Models\Admin\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delegacion extends Model
{
    use HasFactory;

    protected $table = "delegaciones";
    protected $fillable = [
        'id_region',
        'deleg_delegacionla',
        'nivel_delegacional',
        'sede_delegacional'
    ];

    /**
     * Get the region that owns the Delegacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region', 'id');
    }    
}
