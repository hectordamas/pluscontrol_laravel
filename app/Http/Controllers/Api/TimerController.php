<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Timer;
use App\Models\Weekday;
use App\Models\Esp;

class TimerController extends Controller
{
    public function getTimersData(Request $request){
        $timers = Timer::with(['weekdays'])
        ->where('esp_id', $request->id)
        ->get();

        $allWeekdays = Weekday::all();
        $timersWithSelectedWeekdays = [];

        foreach ($timers as $timer) {
            $timerData = $timer->toArray();
            $selectedWeekdays = [];
        
            foreach ($allWeekdays as $weekday) {
                $isSelected = $timer->weekdays->contains('id', $weekday->id);
                $weekday->selected = $isSelected;
                $selectedWeekdays[] = $weekday->toArray();
            }
        
            $timerData['weekdays'] = $selectedWeekdays;
            $timersWithSelectedWeekdays[] = $timerData;
        }

        return response()->json([
            'timers' => $timersWithSelectedWeekdays
        ]);
    }

    public function setTimers(Request $request)
    {
        $timer = Timer::find($request->timerId);
        $timer->hour_start = $request->startHour;
        $timer->minute_start = $request->startMinute;
        $timer->hour_end = $request->endHour;
        $timer->minute_end = $request->endMinute;
        $timer->save();
    
        $selectedDays = $request->input('selectedDays', []);
        $selectedDayIds = collect($selectedDays)->pluck('id')->toArray();
        $timer->weekdays()->sync($selectedDayIds);
    
        return response()->json([
            'message' => 'Horario establecido de forma existosa!'
        ]);
    }

    public function setControl(Request $request){
        $esp = Esp::find($request->id);
        $esp->automatico = $request->auto;
        $esp->salida_valvula = $request->manual;
        $esp->save();

        return response()->json([
            'message' => 'Configuración establecida con éxito!'
        ]);
    }

    public function setDimensions(Request $request){
        $esp = Esp::find($request->id);
        $esp->high = $request->high;
        $esp->volume = $request->volume;
        $esp->lowPressure = $request->lowPressure;
        $esp->highPressure = $request->highPressure;
        $esp->save();

        return response()->json([
            'message' => 'Configuración establecida con éxito!'
        ]);
    }

    public function getDimensions(Request $request){
        $esp = Esp::find($request->id);
        
        return response()->json([
            'esp' => $esp
        ]);
    }
}
