<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Esp;
use App\Models\PhoneToken;
use App\Models\PushNotification;
use Carbon\Carbon;

class NotificationController extends Controller {
  //Funcion general
    private function sendNotification($data){
      $esp = Esp::where('device_id', $data['device_id'])->first();
    
      if ($esp) {
        $phoneTokens = PhoneToken::where('esp_id', $esp->id)->get();
    
        $recipients = $phoneTokens->pluck('device_token')->toArray();
    
        $lastNotification = PushNotification::where('title', $data['title'])
        ->where('esp_id', $esp->id)
        ->orderBy('created_at', 'desc')
        ->first();
    
        $shouldSendNotification = false;
    
        if (!$lastNotification) {
          $shouldSendNotification = true;
        } else {
          $shouldSendNotification = Carbon::now()->diffInHours($lastNotification->created_at) >= 2;
        }
    
        if ($shouldSendNotification) {
          $response = Http::post("https://exp.host/--/api/v2/push/send", [
            "to" => $recipients,
            "title" => $esp->name . ': ' . $data['title'],
            "body" => $data['body']
          ])->json();

          $pushNotification = new PushNotification();
          $pushNotification->title = $data['title'];
          $pushNotification->esp_id = $esp->id;
          $pushNotification->save();

          return ['response' => $response, 'recipients' => $recipients];
        } else {
          return ['response' => 'No se pudo enviar'];
        }
      } else {
        return ['response' => 'No se pudo enviar'];
      }
    }

    public function saveToken(Request $request){
        $esp = Esp::where('device_id', $request->device_id)->first();

        $phoneToken = PhoneToken::firstOrCreate([
            'esp_id' => $esp->id,
            'device_token' => $request->device_token,
        ]);

        return response()->json(["message" => "Token almacenado con éxito"]);
    }


    //Notificaciones de Nivel
    public function lowLevelNotification(Request $request){
        $data = [ 
            'device_id' => $request->device_id, 
            'title' => 'Nivel Bajo de Agua', 
            'body' => "El nivel de agua en tu tanque ha alcanzado un punto bajo. Para garantizar un suministro constante, es crucial que tomes medidas inmediatas para conservar y reponer el agua en tu tanque. Evita el desperdicio y considera fuentes alternativas si es necesario."
        ];

        $this->sendNotification($data);

        return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    public function mediumLevelNotification(Request $request){
        $data = [
            'device_id' => $request->device_id, 
            'title' => 'Nivel Medio de Agua', 
            'body' => "Te informamos que el nivel de agua en tu tanque está en un punto medio. Esto significa que tienes un equilibrio saludable de agua disponible. Continúa utilizando el recurso con conciencia y considera medidas para optimizar el consumo."
        ];

        $this->sendNotification($data);

        return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    //Notificaciones de Entrada
    public function waterSupplyRestored(Request $request){
        $data = [
            'device_id' => $request->device_id, 
            'title' => 'Servicio Público de Agua Restablecido', 
            'body' => "Buenas noticias, el suministro de agua del sistema público ha sido restablecido con éxito. Tu tanque de agua se está llenando."
        ];

        $this->sendNotification($data);

        return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    public function interruptedWaterSupply(Request $request){
        $data = [
            'device_id' => $request->device_id, 
            'title' => 'Servicio Público de Agua Interrumpido', 
            'body' => "El suministro de agua del sistema público ha experimentado una interrupción temporal."
        ];

        $this->sendNotification($data);

        return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    //Notificaciones de suministro interno
    public function internalWaterSupplyRestored(){
      $data = [
        'device_id' => $request->device_id, 
        'title' => 'Suministro Interno de Agua Reestablecido', 
        'body' => "El suministro de agua de tu edificio ha sido reestablecido."
      ];

      $this->sendNotification($data);

      return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    public function interruptedInternalWaterSupply(){
      $data = [
        'device_id' => $request->device_id, 
        'title' => 'Suministro Interno de Agua Interrumpido', 
        'body' => "El suministro de agua de tu edificio ha sido interrumpido temporalmente."
      ];

      $this->sendNotification($data);

      return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    //Alerta por desbordamiento
    public function overflowAlert(Request $request){
        $data = [
            'device_id' => $request->device_id, 
            'title' => 'Alerta por desbordamiento', 
            'body' => "Detectamos un desbordamiento en tu tanque de agua. Es importante tomar medidas inmediatas para detener el suministro de agua y evitar cualquier daño adicional. Por favor, revisa y resuelve la situación para mantener la integridad de tu sistema y conservar el agua."
        ];

        $this->sendNotification($data);

        return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    //Alerta por alta presion
    public function highPressure(Request $request){
      $data = [
        'device_id' => $request->device_id, 
        'title' => '¡Alerta de Presión Excesiva!', 
        'body' => "¡Atención! Se ha detectado una presión inusualmente alta en el sistema de tuberías. Por favor, tome medidas preventivas de inmediato para evitar posibles daños o rupturas."
      ];

      $this->sendNotification($data);

      return response()->json(['message' => 'Notificación enviada con éxito']);
    }

    //Alerta por baja presion
    public function lowPressure(Request $request){
      $data = [
        'device_id' => $request->device_id, 
        'title' => 'Presión Baja Detectada', 
        'body' => "Se ha registrado una disminución significativa en la presión del sistema de tuberías. Por favor, verifique y corrija el problema para evitar interrupciones en el suministro o posibles fallos en el sistema."
      ];

      $this->sendNotification($data);

      return response()->json(['message' => 'Notificación enviada con éxito']);
    }

}
