                    <div class="row">

                        <x-adminlte-select name="select_region" label-class="text-orange" label="SELECCIONA REGIÓN" fgroup-class="col-md-12" wire:model.live="regionId" value={{$regionId}}>
                            <option value="">Selecciona...</option>
                            @foreach ($regiones as $region)
                                <option value="{{$region->id}}" {{ old('select_region',$regionId) == $region->id ? 'selected' : '' }}>
                                    {{ $region->region }} - {{ $region->sede }}
                                </option>
                            @endforeach
                        </x-adminlte-select>


                        <x-adminlte-select name="select_delegacion" label-class="text-orange" label="SELECCIONA DELEGACIÓN" fgroup-class="col-md-12" wire:model="delegacionId">
                            <option value="">Selecciona...</option>
                            @foreach ($delegaciones as $delegacion)
                                <option value="{{ $delegacion->id }}" {{ old('select_delegacion', $delegacionId) == $delegacion->id ? 'selected' : '' }}>
                                    {{ $delegacion->deleg_delegacional }} - {{ $delegacion->nivel_delegacional }} / {{ $delegacion->sede_delegacional }}
                                </option>
                            @endforeach
                        </x-adminlte-select>                        
                                                                      
                    </div>