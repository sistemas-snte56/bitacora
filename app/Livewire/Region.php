<?php

namespace App\Livewire;

use App\Models\Admin\Delegacion;
use App\Models\Admin\Genero;
use App\Models\Admin\Region as AdminRegion;
use Livewire\Component;

class Region extends Component
{

    public $regiones;
    public $delegaciones = [];
    // public $select_delegacion = null;
    public $regionId;
    public $delegacionId;
    // public $generos;

    // Inicializamos las variables del componente de Region
    public function mount()
    {
        $this->regiones = AdminRegion::all();
        $this->delegaciones = collect();
        // $this->generos = Genero::all();

        $this->regionId = old('select_region', $this->regionId);
        $this->delegacionId = old('select_delegacion', $this->delegacionId);
    }
    
    public function render()
    {
        return view('livewire.region');
    }

    public function updatedRegionId($value)
    {
        // $this->delegaciones = Delegacion::where('id_region',$value)->orderBy('deleg_delegacional')->get();
        // $this->delegacionId = optional($this->delegaciones->first())->id;

        // Obtén las delegaciones basadas en la región seleccionada
        $this->delegaciones = Delegacion::where('id_region', $value)
                                        ->orderBy('deleg_delegacional')
                                        ->get();
        
        // Si el valor actual de delegacionId no es válido para la nueva región, límpialo
        // if (!$this->delegaciones->contains('id', $this->delegacionId)) {
        //     $this->delegacionId = null;
        // }      

        // $this->delegacionId = old('select_delegacion', $this->delegacionId);

        $this->delegacionId = null;
    }
}
