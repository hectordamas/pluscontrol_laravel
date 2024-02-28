<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Esp;
use Auth;
use Carbon\Carbon;
use Dompdf\Dompdf;

class HomeController extends Controller {

    public function __construct()
    {

        $this->middleware('admin');

    }



    public function index(){
        $users = User::all();
        $esps = Esp::orderBy('id', 'desc')->get();
        foreach ($esps as $esp) {
            $lastLog = $esp->espLogs()->latest()->first();
            $esp->state = 'Online';
            if(isset($lastLog)){
                if (Carbon::now()->diffInMinutes($lastLog->created_at) > 60) {
                    $esp->state = 'Offline';
                }  
            }
        }

        foreach ($esps as $esp) {
            $expirationDate = $esp->expiration_date;
            $daysToExpiration = Carbon::now()->diffInDays($expirationDate, false);

            if ($daysToExpiration > 15) {
                $esp->paymentStatus = 'Verde';
            } elseif ($daysToExpiration >= 0) {
                $esp->paymentStatus = 'Amarillo';
            } else {
                $esp->paymentStatus = 'Rojo';
            }
        }

        return view('home', [
            'users' => $users,
            'esps' => $esps
        ]);
    }
}
