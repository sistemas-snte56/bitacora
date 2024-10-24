<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Bitacora;
use Illuminate\Support\Carbon;
use App\Models\Admin\Dependencia;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class BitacoraController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:bitacora.index')->only('index');
        $this->middleware('permission:bitacora.edit')->only('edit','update');
        $this->middleware('permission:bitacora.create')->only('create','store');
        $this->middleware('permission:bitacora.destroy')->only('destroy');
    }    

    public function dashboard()
    {
        $userID = Auth::id();
        $userName = Auth::user()->name;

        $countStatus0 = Bitacora::where('id_user',$userID)->where('status',0)->count();
        $countStatus1 = Bitacora::where('id_user',$userID)->where('status',1)->count();
        
        return view('dashboard', compact('countStatus0','countStatus1','userName'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén solo las bitácoras del usuario autenticado
        $bitacoras = Bitacora::where('id_user', Auth::id())->get(); // Filtra por el ID del usuario autenticado
        return view('bitacora.index', compact('bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dependencias = Dependencia::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->dependencia];
        })->toArray();


        // $dependencias = Dependencia::all();
        return view('bitacora.create',compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
                'select_dependencia' => ['required'],
                'motivo' => ['required'],
                'fecha_salida' => ['required','date'],
                'hora_salida' => ['required','date_format:H:i:s'],
                'dependencia_especifica' => ['nullable','string','max:350'],
            ]
        );

        // Obtener el ID de la dependencia
        $id_dependencia = $request->input('select_dependencia');

        // Supongamos que el ID de "Otros" se obtiene de la base de datos o se define de alguna forma
        $idOtros = 17; // Esto debe ser dinámico o configurado de mejor manera

        if ($id_dependencia == $idOtros) {
            // Creamos una nueva dependencia segun las necesidades
            $nuevaDependencia = Dependencia::create([
                'dependencia' => $request->input('dependencia_especifica'),
            ]);

            // Obtener el ID de la nueva dependencia
            $id_dependencia = $nuevaDependencia->id;            
        }

        $bitacora = new Bitacora();
        $bitacora->id_user = Auth::id();
        $bitacora->id_dependencia = $id_dependencia;
        $bitacora->motivo = $request->input('motivo');
        $bitacora->fecha_salida = Carbon::createFromFormat('d-m-Y', $request->input('fecha_salida'));
        $bitacora->hora = Carbon::createFromFormat('H:i:s', $request->input('hora_salida'));
        $bitacora->status = false; // Marca como status
        $bitacora->observacion = $request->input('observacion');
        $bitacora->save();

        return redirect()->route('bitacora.index')->with('success_salida', 'Salida registrada...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Editar";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bitacora = Bitacora::find($id);
        $bitacora->delete();
        return back()->with('success_delete', 'Su registro ha sido eliminado.');
    }

    public function UpdateStatusSalida(Request $request)
    {

        // return response()->json(['var'=>''.$request.'']);


        

        // $statusUpdate = Bitacora::findOrFail($request->id)->update(['status'=>$request->estatus]);

        // if($request->estatus == 0)
        // {
        //     $newStatus = '<h5><span class="badge badge-danger">Sin concluir</span></h5>';
        // } else {
        //     $newStatus = '<h5><span class="badge badge-success">Concluido</span></h5>';
        // }

        // return response()->json(['var'=>''.$newStatus.'']);
        try {
            $statusUpdate = Bitacora::findOrFail($request->id)->update(['status' => $request->estatus,'updated_at' => now()]);
    
            if ($request->estatus == 0) {
                $newStatus = '<h5><span class="badge badge-danger">Sin concluir</span></h5>';
            } else {
                $newStatus = '<h5><span class="badge badge-success">Concluido</span></h5>';
            }
    
            return response()->json(['var' => $newStatus]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }        
    }
}
