<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Esp;
use App\Models\User;
use App\Models\EspLog;
use App\Models\Timer;
use Dompdf\Dompdf;

class EspController extends Controller
{

    public function index(){
        return redirect('/home');
    }

    public function create(){
        $users = User::all();

        return view('devices.create', [
            'users' => $users
        ]);

    }

    public function store(Request $request){
        $user = User::where('email', $request->email)->first();

        $esp = new Esp();
        $esp->name = $request->name;
        $esp->plan = $request->plan;
        $esp->device_id = Str::uuid(); 
        $esp->high = $request->high;
        $esp->volume = $request->volume;
        $esp->save();

        $espLog = new EspLog();
        $espLog->level = 1;
        $espLog->pressure = 1;
        $espLog->litrosPorMinuto = 1;
        $espLog->litrosPorMinuto2 = 1;
        $espLog->device_id = $esp->device_id;
        $espLog->esp_id = $esp->id;
        $espLog->save();

        $esp->users()->syncWithoutDetaching([
            $user->id => [
                'role' => $request->role,
                'alias' => $request->alias,
                'main' => $request->main
            ]
        ]);

        $title = ['Primer Horario', 'Segundo Horario', 'Tercer Horario'];
        for ($i = 0; $i < count($title); $i++) {
            $timer = new Timer();
            $timer->title = $title[$i];
            $timer->esp_id = $esp->id;
            $timer->save();
        }

        return redirect()->back()->with('message', 'Dispositivo creado con éxito!');
    }

    public function edit($id){
        $esp = Esp::find($id);
        $users = User::all();
        return view('devices.edit', [
            'esp' => $esp,
            'users' => $users

        ]);
    }

    public function show($id){
        $esp = Esp::find($id);

        return view('devices.show', [
            'esp' => $esp
        ]);
    }


    public function update($id, Request $request){
        $user = User::where('email', $request->email)->first();

        $esp = Esp::find($id);
        $esp->name = $request->name;
        $esp->plan = $request->plan;
        $esp->high = $request->high;
        $esp->volume = $request->volume;        
        $esp->expiration_date = $request->expiration_date;
        $esp->save();

        if ($user) {
            $attributes = [
                'role' => $request->role,
                'alias' => $request->alias,
                'main' => $request->main,
            ];

            $user->esp()->syncWithoutDetaching([$esp->id => $attributes]);
        }

        return redirect()->back()->with('message', 'Dispositivo modificado con exito!');

    }

    public function destroy($id){
        $esp = Esp::find($id);
        $esp->users()->detach();
        $esp->espLogs()->delete();
        $esp->timers()->delete();        
        $esp->phoneTokens()->delete();
        $esp->delete();

        return response()->json([
            'message' => "Dispositivo eliminado con exito!"
        ]);

    }


    public function renew(Request $request) {
        $deviceIds = $request->input('devices');
        if ($deviceIds) { 
            $esps = Esp::find($request->input('devices'));
            foreach ($esps as $esp) {
                $esp->expiration_date = $request->input('expiration_date');
                $esp->save();
            }
        }

        return redirect('/home');
    }

    public function downloadReceipt($id){
        $esp = Esp::find($id);
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('payment.receipt', ['esp' => $esp])->render());
        $dompdf->render();

        return $dompdf->stream('receipt.pdf');
    }


    public function uploadProof($id, Request $request) {
        $request->validate([
            'proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fileName = time().'.'.$request->proof->extension();  
        $request->proof->move(public_path('uploads'), $fileName);

        $esp = Esp::find($id);
        $esp->payment = $fileName;
        $esp->save();

        return back()->with('success','Comprobante de pago subido correctamente.');
    }

}

