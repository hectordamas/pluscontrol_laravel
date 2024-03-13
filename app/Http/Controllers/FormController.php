<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Aquí debes definir tu número de WhatsApp al que se enviará el mensaje
        $whatsapp = '584122583901';
    
        // Obtener datos del formulario
        $nombre = $request->input('name');
        $cedula = $request->input('cedula');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $address = $request->input('address');
        $plan = $request->input('plan');
        $mensaje = $request->input('mensaje');
    
        // Formatear el mensaje con saltos de línea
        $formatted_message = "----------------------------------\n";
        $formatted_message .= "*SOLICITUD PLUSCONTROL:*\n";
        $formatted_message .= "----------------------------------\n";
        $formatted_message .= "*DATOS DEL CLIENTE*\n";
        $formatted_message .= "----------------------------------\n";
        $formatted_message .= "*Nombre o Razon Social:* $nombre\n";
        $formatted_message .= "*Cedula o RIF:* $cedula\n";
        $formatted_message .= "*Correo Electronico:* $email\n";
        $formatted_message .= "*Telefono:* $telefono\n";
        $formatted_message .= "*Dirección:* $address\n";
        $formatted_message .= "*Plan:* $plan\n";
        $formatted_message .= "==============================\n";
        $formatted_message .= "*Mensaje:*\n";
        $formatted_message .= "----------------------------------\n";
        $formatted_message .= $mensaje;
    
        // Crear la URL con el mensaje formateado
        $url = 'https://api.whatsapp.com/send?phone=' . $whatsapp . '&text=' . urlencode($formatted_message);
    
        // Redirigir a la URL de WhatsApp
        return redirect()->away(nl2br($url));
    }
}
