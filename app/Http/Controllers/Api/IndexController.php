<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Esp;
use App\Models\EspLog;
use App\Models\Weekday;
use App\Models\Timer;
use App\Models\Whatsapp;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\User;

class IndexController extends Controller
{
    public function index(Request $request){        
        try{
            $whatsapp = Whatsapp::orderBy('id', 'desc')->first();
            $user = $request->user();
            $user->load('esps');
    
            $activeEsp = $user->esps->whereNotNull('main')->first();
            if(!$activeEsp){
                $activeEsp = $user->esps->first();
            }
            $esp = $activeEsp;

            $userRole = $activeEsp->pivot->role;
    
            $espLog = EspLog::where('esp_id', $activeEsp->id)
            ->orderBy('id', 'desc')
            ->first();
        
            $espLogs = EspLog::where('esp_id', $activeEsp->id)
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
    
            $espLogs = EspLog::where('esp_id', $activeEsp->id)
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->get();
    
            $logsPorDia = $espLogs->groupBy(function ($log) {
                return $log->created_at->format('d');
            });
        
            $diasDeLaSemana = [];
            $nivelDeLaSemana = [];
            $presionDeLaSemana = [];
    
            $startPeriod = Carbon::now()->addDay();
            $endPeriod = Carbon::now()->subDays(6);
    
            $period = CarbonPeriod::create($endPeriod, '1 day', $startPeriod);
            $period = array_reverse($period->toArray());
    
            foreach($period as $d){
                $dia = $d->format('d');
                $date = Carbon::create(null, date('m'), $dia, 0, 0, 0);
                $diasDeLaSemana[] = $d->translatedFormat('d M');
        
                if (isset($logsPorDia[$dia]) && $logsPorDia[$dia]->count() > 0) {
                    $nivelPromedio = $logsPorDia[$dia]->avg('level');
                    $presionPromedio = $logsPorDia[$dia]->avg('pressure');
                } else {
                    $nivelPromedio = 0;
                    $presionPromedio = 0;
                }
        
                $nivelDeLaSemana[] = $nivelPromedio;
                $presionDeLaSemana[] = $presionPromedio;
            }
    
            $ultimaEntrada = $espLog;
            $status = false;
            if ($ultimaEntrada) {
                $horaActual = Carbon::now();
                $horaUltimaEntrada = Carbon::parse($ultimaEntrada->created_at);

                $diferenciaMinutos = $horaActual->diffInMinutes($horaUltimaEntrada);
    
                if ($diferenciaMinutos > 15) {
                    $status = true;
                }
            } 

            return response()->json([
                'esps' => $user->esps,
                'activeEsp' => $activeEsp,
                'lastEspLog' => $espLog,
                'consumo' => $consumo,
                'tiempoDeLlenado' => $tiempoDeLlenado,
                'tiempoEnMinutos' => $tiempoEnMinutos,
                'diasDeLaSemana' => array_chunk($diasDeLaSemana, 7),
                'nivelDeLaSemana' => array_chunk($nivelDeLaSemana, 7),
                'presionDeLaSemana' => array_chunk($presionDeLaSemana, 7),
                'capacidadEnLitros' => $capacidadEnLitros,
                'entradaActual' => $entrada,
                'whatsapp' => $whatsapp,
                'userRole' => $userRole,
                'status' => $status,
                'diferenciaMinutos' => $diferenciaMinutos
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function newDeviceData(Request $request){
        try{
            $user = User::find($request->userId);
            $user->load('esps');
    
            $activeEsp = $user->esps->find($request->id);
            $esp = $activeEsp;

            $userRole = $activeEsp->pivot->role;
    
            $espLog = EspLog::where('esp_id', $activeEsp->id)
            ->orderBy('id', 'desc')
            ->first();

            $espLogs = EspLog::where('esp_id', $activeEsp->id)
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
    
            $espLogs = EspLog::where('esp_id', $activeEsp->id)
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->get();
    
            $logsPorDia = $espLogs->groupBy(function ($log) {
                return $log->created_at->format('d');
            });
        
            $diasDeLaSemana = [];
            $nivelDeLaSemana = [];
            $presionDeLaSemana = [];
    
            $startPeriod = Carbon::now()->addDay();
            $endPeriod = Carbon::now()->subDays(6);
    
            $period = CarbonPeriod::create($endPeriod, '1 day', $startPeriod);
            $period = array_reverse($period->toArray());
    
            foreach($period as $d){
                $dia = $d->format('d');
                $date = Carbon::create(null, date('m'), $dia, 0, 0, 0);
                $diasDeLaSemana[] = $d->translatedFormat('d M');
        
                if (isset($logsPorDia[$dia]) && $logsPorDia[$dia]->count() > 0) {
                    $nivelPromedio = $logsPorDia[$dia]->avg('level');
                    $presionPromedio = $logsPorDia[$dia]->avg('pressure');
                } else {
                    $nivelPromedio = 0;
                    $presionPromedio = 0;
                }
        
                $nivelDeLaSemana[] = $nivelPromedio;
                $presionDeLaSemana[] = $presionPromedio;
            }
    
            $ultimaEntrada = $espLog;
            $status = false;
            if ($ultimaEntrada) {
                $horaActual = Carbon::now();
                $horaUltimaEntrada = Carbon::parse($ultimaEntrada->created_at);
                $diferenciaMinutos = $horaActual->diffInMinutes($horaUltimaEntrada);
    
                if ($diferenciaMinutos > 15) {
                    $status = true;
                }
            } 

            return response()->json([
                'esps' => $user->esps,
                'activeEsp' => $activeEsp,
                'lastEspLog' => $espLog,
                'consumo' => $consumo,
                'tiempoDeLlenado' => $tiempoDeLlenado,
                'tiempoEnMinutos' => $tiempoEnMinutos,
                'diasDeLaSemana' => array_chunk($diasDeLaSemana, 7),
                'nivelDeLaSemana' => array_chunk($nivelDeLaSemana, 7),
                'presionDeLaSemana' => array_chunk($presionDeLaSemana, 7),
                'capacidadEnLitros' => $capacidadEnLitros,
                'entradaActual' => $entrada,
                'userRole' => $userRole,
                'status' => $status,
                'diferenciaMinutos' => $diferenciaMinutos
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getMonthlyReport(Request $request) {
        $espLogs = EspLog::where('esp_id', $request->id)        
        ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
        ->get();
        
        $logsPorDiaDelMes = $espLogs->groupBy(function ($log) { 
            return $log->created_at->format('d'); 
        });
        
        $labelsMes = [];
        $nivelPromedioPorDiaDelMes = [];
        $presionPromedioPorDiaDelMes = [];

        $startPeriod = Carbon::now()->addDay(1);
        $endPeriod = Carbon::now()->subDays(29);

        $period = CarbonPeriod::create($endPeriod, '1 day', $startPeriod);
        $period = array_reverse($period->toArray());

        foreach($period as $d){
            $dia = $d->format("d");
            $labelsMes[] = $d->translatedFormat('d M');
            
            if (isset($logsPorDiaDelMes[$dia])) {
                $nivelPromedio = $logsPorDiaDelMes[$dia]->avg('level');
                $presionPromedio = $logsPorDiaDelMes[$dia]->avg('pressure');
            } else {
                $nivelPromedio = 0;
                $presionPromedio = 0;
            }
        
            $nivelPromedioPorDiaDelMes[] = $nivelPromedio;
            $presionPromedioPorDiaDelMes[] = $presionPromedio;
        }
    
        return response()->json([
            'labels' => array_chunk($labelsMes, 6),
            'levels' => array_chunk($nivelPromedioPorDiaDelMes, 6),
            'pressures' => array_chunk($presionPromedioPorDiaDelMes, 6),
        ]);
    }

    public function getDailyReport(Request $request){
        $espLogs = EspLog::where('esp_id', $request->id)
        ->whereBetween('created_at', [Carbon::now()->subDay(), Carbon::now()])
        ->get();

        $logsPorHoraDelDia = $espLogs->groupBy(function ($log) {
            return $log->created_at->format('H');
        });
        
        $labelsDia = [];
        $nivelPromedioPorHoraDelDia = [];
        $presionPromedioPorHoraDelDia = [];

        $startPeriod = Carbon::now()->addHour(1);
        $endPeriod = Carbon::now()->subHours(23);
        $period = CarbonPeriod::create($endPeriod, '1 hour', $startPeriod);
        $period = array_reverse($period->toArray());

        foreach($period as $h){
            $hora = $h->format('H');
            $horaEtiqueta = $h->translatedFormat('D h a'); // Formato de hora en 12 horas con AM/PM
            $labelsDia[] = $horaEtiqueta;
            
            if (isset($logsPorHoraDelDia[$hora])) {
                $nivelPromedio = $logsPorHoraDelDia[$hora]->avg('level');
                $presionPromedio = $logsPorHoraDelDia[$hora]->avg('pressure');
            } else {
                $nivelPromedio = 0;
                $presionPromedio = 0;
            }
        
            $nivelPromedioPorHoraDelDia[] = $nivelPromedio;
            $presionPromedioPorHoraDelDia[] = $presionPromedio;
        }
    
        return response()->json([
            'labels' => array_chunk($labelsDia, 5),
            'levels' => array_chunk($nivelPromedioPorHoraDelDia, 5),
            'pressures' => array_chunk($presionPromedioPorHoraDelDia, 5),
        ]);
    }

    public function getWeeklyReport(Request $request) {
        $espLogs = EspLog::where('esp_id', $request->id)
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->get();

        $logsPorDia = $espLogs->groupBy(function ($log) {
            return $log->created_at->format('d');
        });
    
        $diasDeLaSemana = [];
        $nivelDeLaSemana = [];
        $presionDeLaSemana = [];

        $startPeriod = Carbon::now()->addDay();
        $endPeriod = Carbon::now()->subDays(6);

        $period = CarbonPeriod::create($endPeriod, '1 day', $startPeriod);
        $period = array_reverse($period->toArray());

        foreach($period as $d){
            $dia = $d->format('d');
            $date = Carbon::create(null, date('m'), $dia, 0, 0, 0);
            $diasDeLaSemana[] = $d->translatedFormat('d M');
    
            if (isset($logsPorDia[$dia]) && $logsPorDia[$dia]->count() > 0) {
                $nivelPromedio = $logsPorDia[$dia]->avg('level');
                $presionPromedio = $logsPorDia[$dia]->avg('pressure');
            } else {
                $nivelPromedio = 0;
                $presionPromedio = 0;
            }
    
            $nivelDeLaSemana[] = $nivelPromedio;
            $presionDeLaSemana[] = $presionPromedio;
        }
    
        return response()->json([
            'labels' => array_chunk($diasDeLaSemana, 7),
            'levels' => array_chunk($nivelDeLaSemana, 7),
            'pressures' => array_chunk($presionDeLaSemana, 7),
        ]);
    }

    public function getAppStoresVersion() {
        return response()->json([
            'version' => '',
            'storeVersions' => ['1.0.9', '1.0.10']
        ]);
    }
}
