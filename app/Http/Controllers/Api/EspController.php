<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\EspLog;
use App\Events\EspUpdated;

class EspController extends Controller {

    public function store(Request $request){
        $esp = Esp::find($request->id);
        $esp->automatico = $request->automatico;
        $esp->salida_valvula = $request->salida_valvula;
        $esp->sin_suministro = $request->sin_suministro;

        $esp->save();

        return response()->json([
            'esp' => $esp
        ]);
    }



    public function edit(Request $request){
        $esp =  Esp::find($request->esp_id);
        $esp->load('users');
        $pivot = $esp->users->where('id', $request->user_id)->first()->pivot;

        return response()->json([
            'esp' => $esp,
            'pivot' => $pivot
        ]);

    }

    public function update(Request $request){
        $esp =  Esp::find($request->esp_id);
        $esp->users()->updateExistingPivot($request->user_id, [
            'alias' => $request->alias, 
            'main' => $request->main ? 'Si' : NULL
        ]);

        return response()->json([
            'message' => 'Configuración exitosa!'
        ]);
    }
}

