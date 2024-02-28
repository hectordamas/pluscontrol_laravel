<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EspLog;
use App\Models\Esp;
use App\Events\EspUpdated;
use Carbon\Carbon;

class EspLogsController extends Controller
{
    public function store(Request $request){
        $esp = Esp::where('device_id', $request->device_id)->first();
        $esp->flujo = $request->flujo;
        $esp->bajo_nivel = $request->bajo_nivel;
        $esp->wifi = $request->wifi;
        $esp->sin_suministro = $request->sin_suministro;
        $esp->save();

        $espLog = new EspLog();
        $espLog->level = $request->level;
        $espLog->pressure = $request->pressure;
        $espLog->device_id = $request->device_id;
        $espLog->esp_id = $esp->id;
        $espLog->litrosPorMinuto = $request->litrosPorMinuto;
        $espLog->litrosPorMinuto2 = $request->litrosPorMinuto2;
        $espLog->save();

        $oneMonthAgo = Carbon::now()->subMonth();
        
        EspLog::where('esp_id', $esp->id)
        ->where('created_at', '<', $oneMonthAgo)
        ->delete();

        return response()->json([
            'espLog' => $espLog,
            'esp' => $esp
        ]);
    }

    public function getDeviceInfo(Request $request){
       $esp = Esp::with('timers', 'timers.weekdays')
       ->where('device_id', $request->device_id)
       ->first();

       $now = Carbon::now();
       $dia = $now->dayOfWeek;
       $hora = $now->hour;
       $minuto = $now->minute;

       return response()->json([
           'dia' => $dia + 1,
           'hora' => $hora,
           'minuto' => $minuto,
           'esp' => $esp,
        ]);
    }

    public function getDeviceInfoInterval(Request $request){
        $esp = Esp::find($request->id);
        
        $espLog = EspLog::orderBy('id', 'desc')
        ->where('esp_id', $esp->id)
        ->first();

        $espLogs = EspLog::where('esp_id', $esp->id)
        ->where('litrosPorMinuto', '>', 0)
        ->get();

        $entrada = $espLog->litrosPorMinuto;
        $consumo = $espLog->litrosPorMinuto2;

        $diferencialDisponibilidad = $consumo - $entrada;
        $diferencialTiempoDeLlenado = $entrada - $consumo;

        $nivelDeTanque = $espLog->level / 100;
        $capacidadEnLitros = $nivelDeTanque * $esp->volume;
        $vacio = $esp->volume - $capacidadEnLitros;

        $tiempoEnMinutos = $consumo > 0 ? $capacidadEnLitros / $consumo : 0;
        $tiempoDeLlenado = $diferencialTiempoDeLlenado > 0 ? $vacio / $diferencialTiempoDeLlenado : 0;

        return response()->json([
            'esp' => $esp,
            'espLog' => $espLog,
            'consumo' => $consumo,
            'tiempoDeLlenado' => $tiempoDeLlenado,
            'tiempoEnMinutos' => $tiempoEnMinutos,
            'capacidadEnLitros' => $capacidadEnLitros,
            'entradaActual' => $entrada
        ]);
    }
}
